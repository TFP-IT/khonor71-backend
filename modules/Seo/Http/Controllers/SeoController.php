<?php

namespace Modules\Seo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Storage;
use Modules\Localize\Entities\Language;
use Illuminate\Contracts\Support\Renderable;
use App\Helpers\ImageHelper;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_seo')->only('index');
        $this->middleware('permission:update_seo')->only('store');
        $this->middleware('permission:create_seo')->only('store');

        $this->middleware('permission:read_social_site')->only('socialSites');
        $this->middleware('permission:update_social_site')->only('socialSiteStore');
        $this->middleware('permission:create_social_site')->only('socialSiteStore');

        $this->middleware('permission:read_social_link')->only('socialLink');
        $this->middleware('permission:update_social_link')->only('socialLinkStore');
        $this->middleware('permission:create_social_link')->only('socialLinkStore');

        $this->middleware('permission:read_script_manager')->only('scriptManager');
        $this->middleware('permission:update_script_manager')->only('scriptManagerStore');
        $this->middleware('permission:create_script_manager')->only('scriptManagerStore');

        $this->middleware(['demo'])->only(['store','socialSiteStore','socialLinkStore','scriptManagerStore']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $meta_data = Setting::where('id',5)->first();
        $existing_meta = json_decode($meta_data->details);

        return view('seo::index', compact('existing_meta'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('seo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $path = '';
        $request->validate([
            'default_image' => 'file|mimes:gif,jpg,jpeg,png|max:1024', // 1024 KB
        ]);

        $meta_data = Setting::where('id',5)->first();
        $existing_meta = json_decode($meta_data->details);

        $path =  $existing_meta->default_image;
        if ($request->hasFile('default_image')) {
             // Delete previous signature if it exists
             Storage::delete('public/' . $existing_meta->default_image);

            $request_file = $request->file('default_image');
            $upload = ImageHelper::upload($request_file, 'meta_setting');
            $path = $upload['image_path'] ?? null;
        }

        try {

            $details_data ['title']             = $request->input("title");
            $details_data ['meta_tag']          = $request->input("meta_keyword");
            $details_data ['meta_description']  = $request->input("meta_description");
            $details_data ['google_analytics']  = $request->input("google_analytics_id");
            $details_data ['default_image']     = $path;

            $meta_data_up = $meta_data->update([
                'id'       => 5,
                'event'    => 'meta',
                'details'  => json_encode($details_data)
            ]);

            // If the creation was successful, redirect with success message
            return response()->json(['error' => false, 'msg' => localize('data_updated_successfully')]);
        } catch (\Exception $e) {
            // If an exception occurs (e.g., validation error, database error), handle it here
            // You can customize the error message based on the type of exception
            return response()->json(['error' => true, 'msg' => 'Failed to update data: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('seo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('seo::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function socialSites()
    {
        $social_page = Setting::where('id',6)->first();
        $existing_social_page = json_decode($social_page->details);

        return view('seo::social_site', compact('existing_social_page'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function socialSiteStore(Request $request)
    {

        $social_page = Setting::where('id',6)->first();
        $existing_social_page = json_decode($social_page->details);

        try {

            $details_data['fb']             = $request->input("fb");
            $details_data['tw']             = $request->input("tw");
            $details_data['status']         = $request->input("status");
            $details_data['mobile_status']  = Null;

            $social_page_up = $social_page->update([
                'id'       => 6,
                'event'    => 'social_page',
                'details'  => json_encode($details_data)
            ]);

            // If the creation was successful, redirect with success message
            return response()->json(['error' => false, 'msg' => localize('data_updated_successfully')]);
        } catch (\Exception $e) {
            // If an exception occurs (e.g., validation error, database error), handle it here
            // You can customize the error message based on the type of exception
            return response()->json(['error' => true, 'msg' => 'Failed to update data: ' . $e->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function socialLink()
    {
        $social_link = Setting::where('id',111)->first();
        $existing_social_link = json_decode($social_link->details);

        return view('seo::social_link', compact('existing_social_link'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function socialLinkStore(Request $request)
    {
        $social_link = Setting::where('id', 111)->first();

        try {
            $details_data = [
                'fb' => [
                    'link' => $request->input('fb'),
                    'followers' => $request->input('fb_followers'),
                ],
                'tw' => [
                    'link' => $request->input('tw'),
                    'followers' => $request->input('tw_followers'),
                ],
                'linkd' => [
                    'link' => $request->input('linkd'),
                    'followers' => $request->input('linkd_followers'),
                ],
                'instagram' => [
                    'link' => $request->input('instagram'),
                    'followers' => $request->input('instagram_followers'),
                ],
                'pin' => [
                    'link' => $request->input('pin'),
                    'followers' => $request->input('pin_followers'),
                ],
                'vimo' => [
                    'link' => $request->input('vimo'),
                    'followers' => $request->input('vimo_followers'),
                ],
                'youtube' => [
                    'link' => $request->input('youtube'),
                    'followers' => $request->input('youtube_followers'),
                ],
                'flickr' => [
                    'link' => $request->input('flickr'),
                    'followers' => $request->input('flickr_followers'),
                ],
                'vk' => [
                    'link' => $request->input('vk'),
                    'followers' => $request->input('vk_followers'),
                ],
                'whats_app' => [
                    'link' => $request->input('whats_app'),
                    'followers' => $request->input('whats_app_followers'),
                ],
                'google' => null
            ];

            $social_link->update([
                'event' => 'social_link',
                'details' => json_encode($details_data)
            ]);

            // If the creation was successful, redirect with success message
            return response()->json(['error' => false, 'msg' => localize('data_updated_successfully')]);
        } catch (\Exception $e) {
            // If an exception occurs (e.g., validation error, database error), handle it here
            // You can customize the error message based on the type of exception
            return response()->json(['error' => true, 'msg' => 'Failed to update data: ' . $e->getMessage()]);
        }
    }

    /**
     * Summary of sitemapLinks
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sitemapLinks()
    {
        $languages = Language::all();

        return view('seo::sitemap_links', compact('languages'));
    }

    /**
     * Display the Script Manager settings page.
     * @return Renderable
     */
    public function scriptManager()
    {
        $script_data = Setting::firstOrCreate(
            ['id' => 121],
            [
                'event'   => 'script_manager',
                'details' => json_encode([
                    'ga4_id'               => '',
                    'ua_id'                => '',
                    'gtm_id'               => '',
                    'search_console_meta'  => '',
                    'meta_pixel_id'        => '',
                    'tawkto_id'            => '',
                    'hotjar_id'            => '',
                    'custom_head_scripts'  => '',
                    'custom_body_scripts'  => '',
                    'redis_host'           => '',
                    'redis_port'           => '',
                    'redis_password'       => '',
                    'cdn_url'              => '',
                ]),
            ]
        );

        $existing_scripts = json_decode($script_data->details);

        return view('seo::script_manager', compact('existing_scripts'));
    }

    /**
     * Save the Script Manager settings.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scriptManagerStore(Request $request)
    {
        $script_data = Setting::firstOrCreate(
            ['id' => 121],
            ['event' => 'script_manager', 'details' => '{}']
        );

        try {
            $details = [
                'ga4_id'               => $request->input('ga4_id', ''),
                'ua_id'                => $request->input('ua_id', ''),
                'gtm_id'               => $request->input('gtm_id', ''),
                'search_console_meta'  => $request->input('search_console_meta', ''),
                'meta_pixel_id'        => $request->input('meta_pixel_id', ''),
                'tawkto_id'            => $request->input('tawkto_id', ''),
                'hotjar_id'            => $request->input('hotjar_id', ''),
                'custom_head_scripts'  => $request->input('custom_head_scripts', ''),
                'custom_body_scripts'  => $request->input('custom_body_scripts', ''),
                'redis_host'           => $request->input('redis_host', ''),
                'redis_port'           => $request->input('redis_port', ''),
                'redis_password'       => $request->input('redis_password', ''),
                'cdn_url'              => $request->input('cdn_url', ''),
            ];

            $script_data->update([
                'event'   => 'script_manager',
                'details' => json_encode($details),
            ]);

            // Update .env with Redis and CDN settings
            $envData = [
                'REDIS_HOST' => $request->input('redis_host') ?: '127.0.0.1',
                'REDIS_PORT' => $request->input('redis_port') ?: '6379',
                'REDIS_PASSWORD' => empty($request->input('redis_password')) ? 'null' : $request->input('redis_password'),
                'CACHE_DRIVER' => $request->input('enable_redis') == '1' ? 'redis' : 'file',
                'ASSET_URL' => empty($request->input('cdn_url')) ? 'null' : $request->input('cdn_url'),
            ];
            $this->updateEnv($envData);
            \Illuminate\Support\Facades\Artisan::call('config:clear');

            return response()->json(['error' => false, 'msg' => localize('data_updated_successfully')]);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'msg' => 'Failed to update scripts: ' . $e->getMessage()]);
        }
    }

    /**
     * Update the .env file
     */
    private function updateEnv(array $data)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $env = file_get_contents($path);
            foreach ($data as $key => $value) {
                if (preg_match('/^' . $key . '=/m', $env)) {
                    $env = preg_replace('/^' . $key . '=.*/m', $key . '=' . $value, $env);
                } else {
                    $env .= "\n" . $key . '=' . $value;
                }
            }
            file_put_contents($path, $env);
        }
    }

}
