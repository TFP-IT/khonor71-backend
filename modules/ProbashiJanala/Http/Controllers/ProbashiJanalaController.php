<?php

namespace Modules\ProbashiJanala\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Enums\ActivationStatusEnum;
use App\Models\WebUser as ModelsWebUser;
use Illuminate\Support\Facades\Storage;
use Modules\Localize\Entities\Language;
use Illuminate\Contracts\Support\Renderable;
use Modules\ProbashiJanala\Entities\ProbashiNews;
use Modules\ProbashiJanala\DataTables\ProbashiNewsDataTable;
use App\Helpers\ImageHelper;

class ProbashiJanalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_probashi_news')->only('index');
        $this->middleware('permission:create_probashi_news')->only(['create', 'store']);
        $this->middleware('permission:update_probashi_news')->only(['edit', 'update', 'updateStatus', 'deleteVideo', 'deleteImage']);
        $this->middleware('permission:delete_probashi_news')->only(['destroy', 'deleteVideo', 'deleteImage']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(ProbashiNewsDataTable $dataTable)
    {
        return $dataTable->render('probashijanala::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $languages = Language::all();
        $webUsers = ModelsWebUser::all();

        return view('probashijanala::create', compact('languages', 'webUsers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->merge(['language_id' => $request->input('language_id') ?: get_language_id()]);
        $request->validate([
            'language_id' => 'required|exists:languages,id,value,bn',
            'web_user_id' => 'required|exists:web_users,id',
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
        ]);

        // Manage custom url
        $rawTitle = $request->custom_url ?? $request->title ?? null;
        $encode_title = generateSlug($rawTitle);

        // Check the encode_title is unique
        if (ProbashiNews::where('encode_title', $encode_title)->exists()) {
            return redirect()->back()->with('fail', localize('url_already_exists_alert'));
        }

        // Handle image upload
        $imagePath = '';
        if ($request->hasFile('image')) {
            $request_file = $request->file('image');
            $upload = ImageHelper::upload($request_file, 'probashijanala/thumb');
            $imagePath = $upload['image_path'] ?? '';
        }

        // Handle video upload
        $videoPath = '';
        if ($request->hasFile('video')) {
            $request_file = $request->file('video');
            $filename = time() . rand(10, 1000) . '.' . $request_file->extension();
            $videoPath = $request_file->storeAs('probashijanala/video', $filename, 'public');
        }

        DB::beginTransaction();
        try {
            ProbashiNews::create([
                'language_id' => $request->language_id,
                'web_user_id' => $request->web_user_id,
                'publish_date' => $request->publish_date,
                'title' => $request->title,
                'details' => $request->details,
                'thumbnail_image' => $imagePath,
                'image_alt' => $request->image_alt,
                'image_title' => $request->image_title,
                'video' => $videoPath,
                'video_url' => $request->video_url,
                'encode_title' => $encode_title,
                'reference' => $request->reference,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ]);

            DB::commit();

            return redirect()->route('probashijanala.index')->with('success', localize('data_saved_successfully'));

        } catch (\Exception $e) {
            DB::rollback();
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
        return view('probashijanala::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param ProbashiNews $probashiNews
     * @return Renderable
     */
    public function edit(ProbashiNews $probashiNews)
    {
        $languages = Language::all();
        $webUsers = ModelsWebUser::all();

        if ($probashiNews->video) {
            $video_path = asset('storage/' . $probashiNews->video);
            $is_iframe = false;
        } elseif ($probashiNews->video_url) {
            if (Str::contains($probashiNews->video_url, 'youtube.com/watch')) {
                parse_str(parse_url($probashiNews->video_url, PHP_URL_QUERY), $query);
                $video_id = $query['v'] ?? '';
                $video_path = 'https://www.youtube.com/embed/' . $video_id;
                $is_iframe = true;
            } elseif (Str::contains($probashiNews->video_url, 'youtu.be')) {
                $video_id = trim(parse_url($probashiNews->video_url, PHP_URL_PATH), '/');
                $video_path = 'https://www.youtube.com/embed/' . $video_id;
                $is_iframe = true;
            } else {
                $video_path = $probashiNews->video_url;
                $is_iframe = true;
            }
        } else {
            $video_path = '';
            $is_iframe = false;
        }

        return view('probashijanala::edit', compact('probashiNews', 'languages', 'webUsers', 'video_path', 'is_iframe'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $news = ProbashiNews::findOrFail($id);
        $request->merge(['language_id' => $request->input('language_id') ?: ($news->language_id ?? get_language_id())]);
        $request->validate([
            'language_id' => 'required|exists:languages,id,value,bn',
            'web_user_id' => 'required|exists:web_users,id',
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
        ]);

        $probashiNews = ProbashiNews::findOrFail($id);

        // Manage custom url
        $rawTitle = $request->custom_url ?? $request->title ?? null;
        $encode_title = generateSlug($rawTitle);

        // Check the encode_title is unique, except for the current record
        if ($probashiNews->encode_title !== $encode_title && ProbashiNews::where('encode_title', $encode_title)->exists()) {
            DB::rollback();
            return redirect()->back()->with('fail', localize('url_already_exists_alert'));
        }

        DB::beginTransaction();
        try {
            // Handle image update
            if ($request->hasFile('image')) {
                if ($probashiNews->thumbnail_image && Storage::disk('public')->exists($probashiNews->thumbnail_image)) {
                    Storage::disk('public')->delete($probashiNews->thumbnail_image);
                }

                $imageFile = $request->file('image');
                $upload = ImageHelper::upload($imageFile, 'probashijanala/thumb');
                $imagePath = $upload['image_path'] ?? '';
                $probashiNews->thumbnail_image = $imagePath;
            }

            // Handle video update
            if ($request->hasFile('video')) {
                if ($probashiNews->video && Storage::disk('public')->exists($probashiNews->video)) {
                    Storage::disk('public')->delete($probashiNews->video);
                }

                $videoFile = $request->file('video');
                $videoName = time() . rand(10, 1000) . '.' . $videoFile->extension();
                $videoPath = $videoFile->storeAs('probashijanala/video', $videoName, 'public');
                $probashiNews->video = $videoPath;
            }

            $probashiNews->language_id = $request->language_id;
            $probashiNews->web_user_id = $request->web_user_id;
            $probashiNews->publish_date = $request->publish_date;
            $probashiNews->title = $request->title;
            $probashiNews->details = $request->details;
            $probashiNews->video_url = $request->video_url;
            $probashiNews->image_alt = $request->image_alt;
            $probashiNews->image_title = $request->image_title;
            $probashiNews->encode_title = $encode_title;
            $probashiNews->reference = $request->reference;
            $probashiNews->meta_keyword = $request->meta_keyword;
            $probashiNews->meta_description = $request->meta_description;

            $probashiNews->save();

            DB::commit();

            return redirect()->route('probashijanala.index')->with('success', localize('data_updated_successfully'));

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('fail', 'Failed to update data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param ProbashiNews $probashiNews
     * @return Renderable
     */
    public function destroy(ProbashiNews $probashiNews)
    {
        try {
            $probashiNews->delete();

            return response()->json(['success' => 'success']);

        } catch (\Exception $e) {
            return response()->json(['fail' => 'fail']);
        }
    }

    /**
     * Update the status of the specified resource.
     * @param ProbashiNews $probashiNews
     * @return Renderable
     */
    public function updateStatus(ProbashiNews $probashiNews)
    {
        $status = $probashiNews->status->value === ActivationStatusEnum::ACTIVE->value
            ? ActivationStatusEnum::INACTIVE->value
            : ActivationStatusEnum::ACTIVE->value;

        try {
            $probashiNews->update([
                'status' => $status
            ]);

            return response()->json(['success' => 'success']);

        } catch (\Exception $e) {
            return response()->json(['fail' => 'fail']);
        }
    }

    /**
     * Delete the video of the specified resource.
     * @param ProbashiNews $probashiNews
     * @return Renderable
     */
    public function deleteVideo(ProbashiNews $probashiNews)
    {
        try {
            if ($probashiNews->video && Storage::disk('public')->exists($probashiNews->video)) {
                Storage::disk('public')->delete($probashiNews->video);
                $probashiNews->update(['video' => null]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Delete the thumbnail image of the specified resource.
     * @param ProbashiNews $probashiNews
     * @return Renderable
     */
    public function deleteImage(ProbashiNews $probashiNews)
    {
        try {
            if ($probashiNews->thumbnail_image && Storage::disk('public')->exists($probashiNews->thumbnail_image)) {
                Storage::disk('public')->delete($probashiNews->thumbnail_image);
                $probashiNews->update(['thumbnail_image' => null]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
