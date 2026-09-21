<?php

namespace Modules\AutoPost\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Modules\AutoPost\Entities\AutoPostSetting;

class AutoPostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $facebook   = AutoPostSetting::where('platform', 'facebook')->first();
        $twitter    = AutoPostSetting::where('platform', 'twitter')->first();
        $instagram  = AutoPostSetting::where('platform', 'instagram')->first();
        $youtube    = AutoPostSetting::where('platform', 'youtube')->first();
        $tiktok     = AutoPostSetting::where('platform', 'tiktok')->first();
        $googleNews = AutoPostSetting::where('platform', 'google_news')->first();

        return view('autopost::index', compact('facebook', 'twitter', 'instagram', 'youtube', 'tiktok', 'googleNews'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('autopost::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('autopost::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('autopost::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $request->validate([
            'facebook.is_active'    => 'nullable|boolean',
            'twitter.is_active'     => 'nullable|boolean',
            'instagram.is_active'   => 'nullable|boolean',
            'youtube.is_active'     => 'nullable|boolean',
            'tiktok.is_active'      => 'nullable|boolean',
            'google_news.is_active' => 'nullable|boolean',
        ]);

        $rules = [];

        // Facebook
        if ($request->input('facebook.is_active')) {
            $rules['facebook.page_id']      = 'required|string';
            $rules['facebook.access_token'] = 'required|string';
        } else {
            $rules['facebook.page_id']      = 'nullable|string';
            $rules['facebook.access_token'] = 'nullable|string';
        }

        // Twitter
        $rules['twitter.is_test_mode'] = 'nullable|boolean';
        if ($request->input('twitter.is_active')) {
            $rules['twitter.api_key']             = 'required|string';
            $rules['twitter.api_secret']          = 'required|string';
            $rules['twitter.access_token']        = 'required|string';
            $rules['twitter.access_token_secret'] = 'required|string';
        } else {
            $rules['twitter.api_key']             = 'nullable|string';
            $rules['twitter.api_secret']          = 'nullable|string';
            $rules['twitter.access_token']        = 'nullable|string';
            $rules['twitter.access_token_secret'] = 'nullable|string';
        }

        // Instagram
        if ($request->input('instagram.is_active')) {
            $rules['instagram.page_id']      = 'required|string';
            $rules['instagram.access_token'] = 'required|string';
            $rules['instagram.api_key']      = 'nullable|string';
            $rules['instagram.api_secret']   = 'nullable|string';
        } else {
            $rules['instagram.page_id']      = 'nullable|string';
            $rules['instagram.access_token'] = 'nullable|string';
            $rules['instagram.api_key']      = 'nullable|string';
            $rules['instagram.api_secret']   = 'nullable|string';
        }

        // YouTube
        if ($request->input('youtube.is_active')) {
            $rules['youtube.page_id']             = 'nullable|string';
            $rules['youtube.api_key']             = 'nullable|string';
            $rules['youtube.api_secret']          = 'nullable|string';
            $rules['youtube.access_token_secret'] = 'nullable|string';
            $rules['youtube.access_token']        = 'nullable|string';
        } else {
            $rules['youtube.page_id']             = 'nullable|string';
            $rules['youtube.api_key']             = 'nullable|string';
            $rules['youtube.api_secret']          = 'nullable|string';
            $rules['youtube.access_token_secret'] = 'nullable|string';
            $rules['youtube.access_token']        = 'nullable|string';
        }

        // TikTok
        if ($request->input('tiktok.is_active')) {
            $rules['tiktok.api_key']             = 'nullable|string';
            $rules['tiktok.api_secret']          = 'nullable|string';
            $rules['tiktok.page_id']             = 'nullable|string';
            $rules['tiktok.access_token']        = 'nullable|string';
            $rules['tiktok.access_token_secret'] = 'nullable|string';
        } else {
            $rules['tiktok.api_key']             = 'nullable|string';
            $rules['tiktok.api_secret']          = 'nullable|string';
            $rules['tiktok.page_id']             = 'nullable|string';
            $rules['tiktok.access_token']        = 'nullable|string';
            $rules['tiktok.access_token_secret'] = 'nullable|string';
        }

        // Google News
        if ($request->input('google_news.is_active')) {
            $rules['google_news.page_id']      = 'nullable|string';
            $rules['google_news.api_key']      = 'nullable|string';
            $rules['google_news.access_token'] = 'nullable|string';
        } else {
            $rules['google_news.page_id']      = 'nullable|string';
            $rules['google_news.api_key']      = 'nullable|string';
            $rules['google_news.access_token'] = 'nullable|string';
        }

        $data = $request->validate($rules);

        try {
            DB::beginTransaction();

            // Facebook
            $facebook = AutoPostSetting::firstOrCreate(['platform' => 'facebook']);
            $facebook->update([
                'page_id'      => $data['facebook']['page_id'] ?? null,
                'access_token' => $data['facebook']['access_token'] ?? null,
                'is_active'    => $request->boolean('facebook.is_active'),
            ]);

            // Twitter
            $twitter = AutoPostSetting::firstOrCreate(['platform' => 'twitter']);
            $twitter->update([
                'is_test_mode'        => $request->input('twitter.is_test_mode', 1) ? 1 : 0,
                'api_key'             => $data['twitter']['api_key'] ?? null,
                'api_secret'          => $data['twitter']['api_secret'] ?? null,
                'access_token'        => $data['twitter']['access_token'] ?? null,
                'access_token_secret' => $data['twitter']['access_token_secret'] ?? null,
                'is_active'           => $request->boolean('twitter.is_active'),
            ]);

            // Instagram
            $instagram = AutoPostSetting::firstOrCreate(['platform' => 'instagram']);
            $instagram->update([
                'page_id'      => $data['instagram']['page_id'] ?? null,
                'access_token' => $data['instagram']['access_token'] ?? null,
                'api_key'      => $data['instagram']['api_key'] ?? null,
                'api_secret'   => $data['instagram']['api_secret'] ?? null,
                'is_active'    => $request->boolean('instagram.is_active'),
            ]);

            // YouTube
            $youtube = AutoPostSetting::firstOrCreate(['platform' => 'youtube']);
            $youtube->update([
                'page_id'             => $data['youtube']['page_id'] ?? null,
                'api_key'             => $data['youtube']['api_key'] ?? null,
                'api_secret'          => $data['youtube']['api_secret'] ?? null,
                'access_token_secret' => $data['youtube']['access_token_secret'] ?? null,
                'access_token'        => $data['youtube']['access_token'] ?? null,
                'is_active'           => $request->boolean('youtube.is_active'),
            ]);

            // TikTok
            $tiktok = AutoPostSetting::firstOrCreate(['platform' => 'tiktok']);
            $tiktok->update([
                'page_id'             => $data['tiktok']['page_id'] ?? null,
                'api_key'             => $data['tiktok']['api_key'] ?? null,
                'api_secret'          => $data['tiktok']['api_secret'] ?? null,
                'access_token'        => $data['tiktok']['access_token'] ?? null,
                'access_token_secret' => $data['tiktok']['access_token_secret'] ?? null,
                'is_active'           => $request->boolean('tiktok.is_active'),
            ]);

            // Google News
            $googleNews = AutoPostSetting::firstOrCreate(['platform' => 'google_news']);
            $googleNews->update([
                'page_id'      => $data['google_news']['page_id'] ?? null,
                'api_key'      => $data['google_news']['api_key'] ?? null,
                'access_token' => $data['google_news']['access_token'] ?? null,
                'is_active'    => $request->boolean('google_news.is_active'),
            ]);

            DB::commit();
            return redirect()->back()->with('success', localize('social_media_settings_updated_successfully') ?: 'Social media settings updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', (localize('failed_to_update_social_media_settings') ?: 'Failed to update social media settings') . ': ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
