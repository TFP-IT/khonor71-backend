<?php

namespace App\Http\Controllers\Website;

use App\DataTables\WebProbashiNewsDataTable;
use App\Helpers\ThemeHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Localize\Entities\Language;
use Modules\ProbashiJanala\Entities\ProbashiNews;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;

class ProbashiNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:webuser');
    }



public function index(Request $request)
{
    $languages = Language::all();
    
    // Get search query
    $search = $request->get('search');
    
    // Build query
    $query = ProbashiNews::with(['language', 'webUser'])
        ->where('web_user_id', Auth::guard('webuser')->id())
        ->orderBy('id', 'desc');
    
    // Apply search if provided
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('details', 'like', '%' . $search . '%')
              ->orWhereHas('webUser', function($userQuery) use ($search) {
                  $userQuery->where('name', 'like', '%' . $search . '%');
              });
        });
    }
    
    // Get per page value, default to 10
    $perPage = $request->get('per_page', 10);
    $perPage = in_array($perPage, [10, 25, 50, 100]) ? $perPage : 10;
    
    // Paginate results
    $probashiNews = $query->paginate($perPage)->appends(request()->query());
    
    return ThemeHelper::view('my_probashi_news', compact('languages', 'probashiNews', 'search'));
}

public function create()
{
    $languages = Language::all();
    $user = auth()->guard('webuser')->user();
    return ThemeHelper::view('create_probashi_news', compact('languages', 'user'));
}


public function store(Request $request)
{
    $request->validate([
        'language_id' => 'required|exists:languages,id',
        'web_user_id' => 'required|exists:web_users,id',
        'publish_date' => 'required|date',
        'title' => 'required|string|max:255',
        'details' => 'required|string',
        'image' => 'nullable|file|mimes:jpg,jpeg,png,gif,bmp,svg,webp,avif|max:5120',
        'video' => 'nullable|file|mimetypes:video/mp4,video/x-msvideo,video/quicktime,video/x-matroska,video/webm,video/ogg,video/mpeg|max:51200',
        'video_url' => 'nullable|url',
        'image_alt' => 'nullable|string|max:255',
        'image_title' => 'nullable|string|max:255',
        'custom_url' => 'nullable|string|max:200',
        'reference' => 'nullable|string|max:255',
        'meta_keyword' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
    ]);

    // Ensure only the authenticated user can create posts
    if ($request->web_user_id != Auth::guard('webuser')->id()) {
        abort(403, 'Unauthorized');
    }

    // Manage custom URL
    $rawTitle = $request->custom_url ?? $request->title ?? null;
    $encode_title = generateSlug($rawTitle);

    // Check if encode_title is unique
    if (ProbashiNews::where('encode_title', $encode_title)->where('web_user_id', Auth::guard('webuser')->id())->exists()) {
        return redirect()->back()->with('fail', localize('url_already_exists_alert'));
    }

    // Handle image upload
    $imagePath = '';
    if ($request->hasFile('image')) {
        $filename = time() . rand(10, 1000) . '.' . $request->file('image')->extension();
        $imagePath = $request->file('image')->storeAs('probashi-news/thumb', $filename, 'public');
    }

    // Handle video upload and frame extraction
    $videoPath = '';
    $videoThumbnailPath = '';
    $thumbnails = [];
    if ($request->hasFile('video')) {
        // Store the video
        $filename = time() . rand(10, 1000) . '.' . $request->file('video')->extension();
        $videoPath = $request->file('video')->storeAs('probashi-news/video', $filename, 'public');

        // Extract 5 thumbnails from the video
        try {
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries'  => env('FFMPEG_PATH', '/usr/bin/ffmpeg'),
                'ffprobe.binaries' => env('FFPROBE_PATH', '/usr/bin/ffprobe'),
                'timeout'          => 3600,
                'ffmpeg.threads'   => 12,
            ]);

            // Open the uploaded video
            $video = $ffmpeg->open(storage_path('app/public/' . $videoPath));

            // Get video duration in seconds using FFProbe
            $duration = $video->getFFProbe()->format(storage_path('app/public/' . $videoPath))->get('duration');

            // Calculate 5 evenly spaced intervals
            $numThumbnails = 5;
            $interval = $duration / $numThumbnails;
            $frameTimes = [];
            for ($i = 0; $i < $numThumbnails; $i++) {
                $frameTime = min(1 + ($i * $interval), $duration - 1); // Start at 1 second, cap at duration-1
                $frameTimes[] = round($frameTime);
            }

            // Generate thumbnails
            foreach ($frameTimes as $index => $frameTime) {
                $thumbnailFilename = time() . rand(10, 1000) . "_thumb{$index}.jpg";
                $thumbnailPath = 'probashi-news/thumb/' . $thumbnailFilename;

                $video->frame(TimeCode::fromSeconds($frameTime))
                    ->save(storage_path('app/public/' . $thumbnailPath));

                $thumbnails[] = [
                    'thumbnail_path' => $thumbnailPath,
                    'frame_time' => $frameTime,
                ];

                // Use the first thumbnail as the primary thumbnail if no image is uploaded
                if ($index === 0 && !$imagePath) {
                    $videoThumbnailPath = $thumbnailPath;
                }
            }
        } catch (\Exception $e) {
            \Log::error('Frame extraction failed: ' . $e->getMessage());
            // Continue without thumbnails or fail based on your preference
        }
    }

    DB::beginTransaction();
    try {
        // Create the ProbashiNews record
        $probashiNews = ProbashiNews::create([
            'language_id' => $request->language_id,
            'web_user_id' => $request->web_user_id,
            'publish_date' => $request->publish_date,
            'title' => $request->title,
            'details' => $request->details,
            'thumbnail_image' => $imagePath ?: $videoThumbnailPath,
            'image_alt' => $request->image_alt,
            'image_title' => $request->image_title,
            'video' => $videoPath,
            'video_url' => $request->video_url,
            'encode_title' => $encode_title,
            'reference' => $request->reference,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => '0',
        ]);

        // Store thumbnails in probashi_news_thumbnails table
        foreach ($thumbnails as $thumbnail) {
            $probashiNews->thumbnails()->create([
                'probashi_news_id' => $probashiNews->id,
                'thumbnail_path' => $thumbnail['thumbnail_path'],
                'frame_time' => $thumbnail['frame_time'],
            ]);
        }

        DB::commit();
        return redirect()->route('account.probashi.news')->with('success', localize('news_uploaded_successfully'));
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('fail', 'Failed to save data: ' . $e->getMessage());
    }
}
}
