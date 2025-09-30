<?php

namespace Modules\VideoNews\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Enums\ActivationStatusEnum;
use Illuminate\Support\Facades\Storage;
use Modules\Localize\Entities\Language;
use Modules\Reporter\Entities\Reporter;
use Modules\VideoNews\Entities\VideoNews;
use Illuminate\Contracts\Support\Renderable;
use Modules\VideoNews\DataTables\VideoNewsDataTable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VideoNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_video_news')->only('index');
        $this->middleware('permission:create_video_news')->only(['create', 'store']);
        $this->middleware('permission:update_video_news')->only(['edit', 'update', 'updateStatus', 'deleteVideo', 'deleteImage']);
        $this->middleware('permission:delete_video_news')->only('destroy', 'deleteVideo', 'deleteImage');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(VideoNewsDataTable $dataTable)
    {
        return $dataTable->render('videonews::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $languages = Language::all();
        $reporters = Reporter::all();

        return view('videonews::create', compact('languages', 'reporters'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id',
            'reporter_id' => 'required|exists:reporters,id',
            'publish_date' => 'required|date',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,gif,bmp,svg,webp,avif|max:5120',
            'video' => 'nullable|file|mimetypes:video/mp4,video/x-msvideo,video/quicktime,video/x-matroska,video/webm,video/ogg,video/mpeg',
            'video_url' => 'nullable|url',
            'image_alt' => 'nullable|string|max:255',
            'image_title' => 'nullable|string|max:255',
            'custom_url' => 'nullable|string|max:200',
            'reference' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'is_tv_news' => 'nullable|boolean',
        ]);

        // Manage custom url
        $rawTitle = $request->custom_url ?? $request->title ?? null;
        $encode_title = generateSlug($rawTitle);

        // Check the encode_title is unique
        if (VideoNews::where('encode_title', $encode_title)->exists()) {
            return redirect()->back()->with('fail', localize('url_already_exists_alert'));
        }

        
        // Ensure APP_URL is set
        if (!env('APP_URL')) {
            \Log::error('APP_URL not set in .env');
            return redirect()->back()->with('fail', 'APP_URL not configured');
        }
        $qr_code_link = env('APP_URL') . '/' . $encode_title;
        \Log::info('QR code link generated: ' . $qr_code_link);

        // Handle image upload
        $imagePath = '';
        if ($request->hasFile('image')) {
            $request_file = $request->file('image');
            $filename = time() . rand(10, 1000) . '.' . $request_file->extension();
            $imagePath = $request_file->storeAs('videonews/thumb', $filename, 'public');
        }

        // Handle video upload
        $videoPath = '';
        $thumbnailVideoPath = '';
        if ($request->hasFile('video')) {
            $request_file = $request->file('video');
            $filename = time() . rand(10, 1000);
            $extension = $request_file->extension();
            $videoPath = $request_file->storeAs('videonews/video', $filename . '.' . $extension, 'public');

            // Crop first 5 seconds for thumbnail video if is_tv_news is true
            if ($request->boolean('is_tv_news')) {
                $inputPath = storage_path('app/public/' . $videoPath);
                $thumbnailFilename = $filename . '_thumb.' . $extension;
                $thumbnailVideoPath = 'videonews/thumb_video/' . $thumbnailFilename;
                $outputPath = storage_path('app/public/' . $thumbnailVideoPath);

                // Ensure the thumb_video directory exists
                Storage::disk('public')->makeDirectory('videonews/thumb_video');

                // FFmpeg command to crop first 5 seconds and resize width to 256px (height auto)
                $ffmpegCommand = sprintf(
                    'ffmpeg -i %s -t 5 -vf "scale=256:-2" -c:a copy %s',
                    escapeshellarg($inputPath),
                    escapeshellarg($outputPath)
                );

                try {
                    exec($ffmpegCommand . ' 2>&1', $output, $returnVar);
                    if ($returnVar !== 0) {
                        throw new \Exception('FFmpeg failed: ' . implode(', ', $output));
                    }
                } catch (\Exception $e) {
                    // Log error and continue without thumbnail video
                    \Log::error('FFmpeg thumbnail video creation failed: ' . $e->getMessage());
                    $thumbnailVideoPath = '';
                }
            }
        }

         // Generate and save QR code
        $qrCodePath = '';
        try {
            $filename = time() . rand(10, 1000) . '.png';
            $qrCodePath = 'videonews/qr_codes/' . $filename;
            Storage::disk('public')->makeDirectory('videonews/qr_codes');
            \Log::info('QR code directory created: videonews/qr_codes');

            // Generate QR code
            $qrCode = QrCode::encoding('UTF-8')->format('png')->size(200)->generate($qr_code_link);
            if (empty($qrCode)) {
                throw new \Exception('QR code generation returned empty result');
            }

            // Save QR code to storage
            $saved = Storage::disk('public')->put($qrCodePath, $qrCode);
            if (!$saved) {
                throw new \Exception('Failed to save QR code to ' . $qrCodePath);
            }
            \Log::info('QR code saved to: ' . $qrCodePath);

            // Verify file exists
            if (!Storage::disk('public')->exists($qrCodePath)) {
                throw new \Exception('QR code file not found at ' . $qrCodePath);
            }
        } catch (\Exception $e) {
            \Log::error('QR code generation failed: ' . $e->getMessage());
            $qrCodePath = '';
        }

        DB::beginTransaction();
        try {
            $videoNews = VideoNews::create([
                'language_id' => $request->language_id,
                'reporter_id' => $request->reporter_id,
                'publish_date' => $request->publish_date,
                'title' => $request->title,
                'details' => $request->details,
                'thumbnail_image' => $imagePath,
                'image_alt' => $request->image_alt,
                'image_title' => $request->image_title,
                'video' => $videoPath,
                'video_url' => $request->video_url,
                'thumbnail_video' => $thumbnailVideoPath,
                'qr_code' => $qrCodePath,
                'encode_title' => $encode_title,
                'reference' => $request->reference,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'is_tv_news' => $request->boolean('is_tv_news'),
            ]);
            \Log::info('VideoNews created with ID: ' . $videoNews->id . ', QR code: ' . $qrCodePath);
            DB::commit();

            return redirect()->route('videonews.index')->with('success', localize('data_saved_successfully'));


        } catch (\Exception $e) {
            \Log::error('Database transaction failed: ' . $e->getMessage());
            DB::rollback();
            if ($imagePath) Storage::disk('public')->delete($imagePath);
            if ($videoPath) Storage::disk('public')->delete($videoPath);
            if ($thumbnailVideoPath) Storage::disk('public')->delete($thumbnailVideoPath);
            if ($qrCodePath) Storage::disk('public')->delete($qrCodePath);
            return redirect()->back()->with('fail', 'Failed to save data: ' . $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('videonews::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(VideoNews $videonews)
    {
        $languages = Language::all();
        $reporters = Reporter::all();

        if ($videonews->video) {
            $video_path = asset('storage/' . $videonews->video);
            $is_iframe = false;
        } elseif ($videonews->video_url) {
            if (Str::contains($videonews->video_url, 'youtube.com/watch')) {
                parse_str(parse_url($videonews->video_url, PHP_URL_QUERY), $query);
                $video_id = $query['v'] ?? '';
                $video_path = 'https://www.youtube.com/embed/' . $video_id;
                $is_iframe = true;
            } elseif (Str::contains($videonews->video_url, 'youtu.be')) {
                $video_id = trim(parse_url($videonews->video_url, PHP_URL_PATH), '/');
                $video_path = 'https://www.youtube.com/embed/' . $video_id;
                $is_iframe = true;
            } else {
                $video_path = $videonews->video_url;
                $is_iframe = true;
            }
        } else {
            $video_path = '';
            $is_iframe = false;
        }

        return view('videonews::edit', compact('videonews', 'languages', 'reporters', 'video_path', 'is_iframe'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id',
            'reporter_id' => 'required|exists:reporters,id',
            'publish_date' => 'required|date',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,gif,bmp,svg,webp,avif|max:5120',
            'video' => 'nullable|file|mimetypes:video/mp4,video/x-msvideo,video/quicktime,video/x-matroska,video/webm,video/ogg,video/mpeg',
            'video_url' => 'nullable|url',
            'image_alt' => 'nullable|string|max:255',
            'image_title' => 'nullable|string|max:255',
            'custom_url' => 'nullable|string|max:200',
            'reference' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'is_tv_news' => 'nullable|boolean',
        ]);

        $videonews = VideoNews::findOrFail($id);

        // Manage custom URL
        $rawTitle = $request->custom_url ?? $request->title ?? null;
        $encode_title = generateSlug($rawTitle);

        // Check if encode_title is unique, except for the current record
        if ($videonews->encode_title !== $encode_title && VideoNews::where('encode_title', $encode_title)->exists()) {
            \Log::warning('Duplicate encode_title detected: ' . $encode_title);
            return redirect()->back()->with('fail', localize('url_already_exists_alert'));
        }

        // Generate QR code if encode_title has changed or no QR code exists
        $qrCodePath = $videonews->qr_code;
        if ($videonews->encode_title !== $encode_title || empty($videonews->qr_code)) {
            // Ensure APP_URL is set
            if (!env('APP_URL')) {
                \Log::error('APP_URL not set in .env');
                return redirect()->back()->with('fail', 'APP_URL not configured');
            }
            $qr_code_link = env('APP_URL') . '/' . $encode_title;
            \Log::info('QR code link generated: ' . $qr_code_link);

            // Delete old QR code if it exists
            if ($qrCodePath && Storage::disk('public')->exists($qrCodePath)) {
                Storage::disk('public')->delete($qrCodePath);
                \Log::info('Old QR code deleted: ' . $qrCodePath);
            }

            // Generate and save new QR code
            try {
                // Check if GD or Imagick is available
                if (!extension_loaded('gd') && !extension_loaded('imagick')) {
                    throw new \Exception('Neither GD nor Imagick PHP extension is installed');
                }
                \Log::info('Using ' . (extension_loaded('imagick') ? 'Imagick' : 'GD') . ' for QR code generation');

                $filename = time() . rand(10, 1000) . '.png';
                $qrCodePath = 'videonews/qr_codes/' . $filename;
                Storage::disk('public')->makeDirectory('videonews/qr_codes');
                \Log::info('QR code directory created: videonews/qr_codes');

                // Generate QR code
                $qrCode = QrCode::encoding('UTF-8')->format('png')->size(200)->generate($qr_code_link);
                if (empty($qrCode)) {
                    throw new \Exception('QR code generation returned empty result');
                }

                // Save QR code to storage
                $saved = Storage::disk('public')->put($qrCodePath, $qrCode);
                if (!$saved) {
                    throw new \Exception('Failed to save QR code to ' . $qrCodePath);
                }
                \Log::info('QR code saved to: ' . $qrCodePath);

                // Verify file exists
                if (!Storage::disk('public')->exists($qrCodePath)) {
                    throw new \Exception('QR code file not found at ' . $qrCodePath);
                }
            } catch (\Exception $e) {
                \Log::error('QR code generation failed: ' . $e->getMessage());
                $qrCodePath = '';
            }
        }

        DB::beginTransaction();
        try {
            // Handle image update
            $imagePath = $videonews->thumbnail_image;
            if ($request->hasFile('image')) {
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                    \Log::info('Old image deleted: ' . $imagePath);
                }

                $imageFile = $request->file('image');
                $imageName = time() . rand(10, 1000) . '.' . $imageFile->extension();
                $imagePath = $imageFile->storeAs('videonews/thumb', $imageName, 'public');
                \Log::info('Image uploaded to: ' . $imagePath);
            }

            // Handle video update
            $videoPath = $videonews->video;
            $thumbnailVideoPath = $videonews->thumbnail_video;
            if ($request->hasFile('video')) {
                // Delete old video and thumbnail video if they exist
                if ($videoPath && Storage::disk('public')->exists($videoPath)) {
                    Storage::disk('public')->delete($videoPath);
                    \Log::info('Old video deleted: ' . $videoPath);
                }
                if ($thumbnailVideoPath && Storage::disk('public')->exists($thumbnailVideoPath)) {
                    Storage::disk('public')->delete($thumbnailVideoPath);
                    \Log::info('Old thumbnail video deleted: ' . $thumbnailVideoPath);
                    $thumbnailVideoPath = '';
                }

                // Upload new video
                $videoFile = $request->file('video');
                $videoName = time() . rand(10, 1000);
                $extension = $videoFile->extension();
                $videoPath = $videoFile->storeAs('videonews/video', $videoName . '.' . $extension, 'public');
                \Log::info('Video uploaded to: ' . $videoPath);

                // Crop first 5 seconds for thumbnail video if is_tv_news is true
                if ($request->boolean('is_tv_news')) {
                    $inputPath = storage_path('app/public/' . $videoPath);
                    $thumbnailFilename = $videoName . '_thumb.' . $extension;
                    $thumbnailVideoPath = 'videonews/thumb_video/' . $thumbnailFilename;
                    $outputPath = storage_path('app/public/' . $thumbnailVideoPath);

                    // Ensure the thumb_video directory exists
                    Storage::disk('public')->makeDirectory('videonews/thumb_video');
                    \Log::info('Thumbnail video directory created: videonews/thumb_video');

                    // FFmpeg command to crop first 5 seconds and resize width to 256px (height auto)
                    $ffmpegCommand = sprintf(
                        'ffmpeg -i %s -t 5 -vf "scale=256:-2" -c:a copy %s',
                        escapeshellarg($inputPath),
                        escapeshellarg($outputPath)
                    );

                    try {
                        exec($ffmpegCommand . ' 2>&1', $output, $returnVar);
                        if ($returnVar !== 0) {
                            throw new \Exception('FFmpeg failed: ' . implode(', ', $output));
                        }
                        \Log::info('Thumbnail video created: ' . $thumbnailVideoPath);
                    } catch (\Exception $e) {
                        \Log::error('FFmpeg thumbnail video creation failed: ' . $e->getMessage());
                        $thumbnailVideoPath = '';
                    }
                }
            } elseif (!$request->boolean('is_tv_news') && $thumbnailVideoPath && Storage::disk('public')->exists($thumbnailVideoPath)) {
                // If is_tv_news is false, delete existing thumbnail video
                Storage::disk('public')->delete($thumbnailVideoPath);
                \Log::info('Thumbnail video deleted as is_tv_news is false: ' . $thumbnailVideoPath);
                $thumbnailVideoPath = '';
            }

            // Update VideoNews fields
            $videonews->language_id = $request->language_id;
            $videonews->reporter_id = $request->reporter_id;
            $videonews->publish_date = $request->publish_date;
            $videonews->title = $request->title;
            $videonews->details = $request->details;
            $videonews->thumbnail_image = $imagePath;
            $videonews->video = $videoPath;
            $videonews->video_url = $request->video_url;
            $videonews->thumbnail_video = $thumbnailVideoPath;
            $videonews->qr_code = $qrCodePath;
            $videonews->encode_title = $encode_title;
            $videonews->reference = $request->reference;
            $videonews->meta_keyword = $request->meta_keyword;
            $videonews->meta_description = $request->meta_description;
            $videonews->is_tv_news = $request->boolean('is_tv_news');

            $videonews->save();
            \Log::info('VideoNews updated with ID: ' . $videonews->id . ', QR code: ' . $qrCodePath);

            DB::commit();

            return redirect()->route('videonews.index')->with('success', localize('data_updated_successfully'));
        } catch (\Exception $e) {
            \Log::error('Database transaction failed: ' . $e->getMessage());
            DB::rollback();
            // Clean up uploaded files if transaction fails
            if ($request->hasFile('image') && $imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
                \Log::info('Cleaned up image: ' . $imagePath);
            }
            if ($request->hasFile('video') && $videoPath && Storage::disk('public')->exists($videoPath)) {
                Storage::disk('public')->delete($videoPath);
                \Log::info('Cleaned up video: ' . $videoPath);
            }
            if ($thumbnailVideoPath && Storage::disk('public')->exists($thumbnailVideoPath)) {
                Storage::disk('public')->delete($thumbnailVideoPath);
                \Log::info('Cleaned up thumbnail video: ' . $thumbnailVideoPath);
            }
            if ($qrCodePath && Storage::disk('public')->exists($qrCodePath)) {
                Storage::disk('public')->delete($qrCodePath);
                \Log::info('Cleaned up QR code: ' . $qrCodePath);
            }
            return redirect()->back()->with('fail', 'Failed to update data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(VideoNews $videonews)
    {
        try {
            $videonews->delete();

            return response()->json(['success' => 'success']);

        } catch (\Exception $e) {
            return response()->json(['fail' => 'fail']);
        }
    }

    /**
     * Update the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function updateStatus(VideoNews $videonews)
    {
        
        $status = $videonews->status->value === ActivationStatusEnum::ACTIVE->value
            ? ActivationStatusEnum::INACTIVE->value
            : ActivationStatusEnum::ACTIVE->value;
        
        try {
            $videonews->update([
                'status' => $status
            ]);

            return response()->json(['success' => 'success']);

        } catch (\Exception $e) {
            return response()->json(['fail' => 'fail']);
        }
    }

    public function deleteVideo(VideoNews $videonews)
    {
        try {
            if ($videonews->video && Storage::disk('public')->exists($videonews->video)) {
                Storage::disk('public')->delete($videonews->video);
                $videonews->update(['video' => null]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function deleteImage(VideoNews $videonews)
    {
        try {
            if ($videonews->thumbnail_image && Storage::disk('public')->exists($videonews->thumbnail_image)) {
                Storage::disk('public')->delete($videonews->thumbnail_image);
                $videonews->update(['thumbnail_image' => null]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

}
