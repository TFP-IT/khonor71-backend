<?php

namespace App\Helpers;

use App\Models\SpaceCredential;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageHelper
{
    /**
     * Image Upload
     * @param object $file
     * @param string $folderName
     * @param string $disk
     * @param array $size
     * @return null|array
     */
    public static function upload($file, $folderName = "images", $disk = 'local', $size = []): ?array
    {
        if (!$file) {
            return null;
        }

        $spaceCredential = SpaceCredential::where('status', 1)->first();
        if ($spaceCredential) {
            $disk = 's3';
        }

        // Default format to webp for all uploaded media
        $format = !empty($size['format']) ? strtolower($size['format']) : 'webp';

        $baseName = (is_object($file) && method_exists($file, 'hashName'))
            ? pathinfo($file->hashName(), PATHINFO_FILENAME)
            : md5(uniqid((string) mt_rand(), true));
        $filename = $baseName . '.' . $format;
        $imagePath       = $folderName . '/' . $filename;
        $imageUploadPath = $imagePath;

        // If file is SVG, store as is without rasterizing
        $extension = strtolower(is_object($file) && method_exists($file, 'getClientOriginalExtension') ? $file->getClientOriginalExtension() : '');
        if ($extension === 'svg') {
            $filename = $baseName . '.svg';
            $imagePath = $folderName . '/' . $filename;
            $imageUploadPath = ($disk === 'local') ? 'public/' . $imagePath : $imagePath;
            Storage::disk($disk)->put($imageUploadPath, file_get_contents($file->getRealPath()));
            return [
                'image_path' => $imagePath,
                'image_url'  => Storage::disk($disk)->url($imagePath),
                'disk'       => $disk,
            ];
        }

        // Load image and correct orientation
        $realPath = (is_object($file) && method_exists($file, 'getRealPath'))
            ? $file->getRealPath()
            : (is_string($file) ? $file : null);

        $image = Image::make($realPath ?: $file)->orientate();

        // Get original image dimensions
        $originalWidth  = $image->width();
        $originalHeight = $image->height();

        // Resize / fit maintaining aspect ratio with exact target dimensions
        if (!empty($size['width']) && !empty($size['height'])) {
            $targetWidth  = (int) $size['width'];
            $targetHeight = (int) $size['height'];

            if ($originalWidth !== $targetWidth || $originalHeight !== $targetHeight) {
                $mode = $size['mode'] ?? 'fit';
                if ($mode === 'resize') {
                    $image->resize($targetWidth, $targetHeight);
                } else {
                    $image->fit($targetWidth, $targetHeight);
                }
            }
        } elseif (!empty($size['width'])) {
            $image->widen((int) $size['width'], function ($constraint) {
                $constraint->upsize();
            });
        } elseif (!empty($size['height'])) {
            $image->heighten((int) $size['height'], function ($constraint) {
                $constraint->upsize();
            });
        }

        // Set image quality
        $quality = $size['quality'] ?? 80;
        $encodedImage = $image->encode($format, $quality);

        // Handle dynamic S3 disk setup
        if ($disk === 's3') {
            if ($spaceCredential) {
                Config::set('filesystems.disks.s3', [
                    'driver' => 's3',
                    'key'    => $spaceCredential->key,
                    'secret' => $spaceCredential->secret,
                    'region' => $spaceCredential->region,
                    'bucket' => $spaceCredential->bucket,
                    'url'    => $spaceCredential->url,
                ]);
            } else {
                $disk = 'local'; // fallback
            }
        }

        // Prefix with 'public/' for local disk
        if ($disk === 'local') {
            $imageUploadPath = 'public/' . $imagePath;
        }

        Storage::disk($disk)->put($imageUploadPath, $encodedImage->__toString());

        $imageUrl = Storage::disk($disk)->url($imagePath);

        return [
            'image_path' => $imagePath,
            'image_url'  => $imageUrl,
            'disk'       => $disk,
        ];
    }

    /**
     * Delete file from storage
     *
     * @param string|null $file
     * @param string $disk
     * @return bool
     */
    public static function delete_file(string $file, $disk = 'local', ): bool
    {
        $uploadDisk = config('filesystems.default', 'local');

        if ($uploadDisk == 's3') {
            $spaceCredential = SpaceCredential::where('status', 1)->first();

            if ($spaceCredential) {
                Config::set('filesystems.disks.s3', [
                    'driver' => 's3',
                    'key'    => $spaceCredential->key,
                    'secret' => $spaceCredential->secret,
                    'region' => $spaceCredential->region,
                    'bucket' => $spaceCredential->bucket,
                    'url'    => $spaceCredential->url,
                ]);
            } else {
                $disk = 'local';
            }

        }

        if (!storage_exist($file)) {
            return false;
        }

        return Storage::disk($disk)->delete($file);

    }

}
