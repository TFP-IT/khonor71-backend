<?php

namespace Modules\Setting\Http\Controllers;

use App\Enums\FontSetupEnum;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Setting\Entities\Language;
use Modules\Setting\Entities\FontSetup;
use Modules\Setting\Entities\FontSetting;
use Illuminate\Contracts\Support\Renderable;

class FontSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $languages = Language::all();
        $fonts = FontSetting::all();
        $fontSetting = FontSetup::getByLanguageGroupedByType(get_language_id());

        return view('setting::font_setup.index', compact('languages', 'fonts', 'fontSetting'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->merge(['language_id' => $request->input('language_id') ?: get_language_id()]);
        $validated = $request->validate([
            'language_id'       => 'required|integer|exists:languages,id,value,bn',
            'principal_font'    => 'required|integer|exists:font_settings,id',
            'alternate_font'    => 'required|integer|exists:font_settings,id',
            'supplementary_font'=> 'required|integer|exists:font_settings,id',
        ]);

        $languageId = $validated['language_id'];

        // Define mapping of enum to form field name
        $fontMappings = [
            FontSetupEnum::PRINCIPAL->value     => $validated['principal_font'],
            FontSetupEnum::ALTERNATE->value     => $validated['alternate_font'],
            FontSetupEnum::SUPPLEMENTARY->value => $validated['supplementary_font'],
        ];

        foreach ($fontMappings as $type => $fontSettingId) {
            FontSetup::updateOrCreate(
                [
                    'language_id' => $languageId,
                    'type'        => $type,
                ],
                [
                    'font_setting_id' => $fontSettingId,
                ]
            );
        }

        // Frontend HTML is page-cached. Bump its version so requests use the
        // newly selected fonts immediately instead of serving stale markup.
        Cache::put(
            'page_cache_version',
            (int) Cache::get('page_cache_version', 1) + 1
        );

        return redirect()->back()->with('success', __('Font settings updated successfully.'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::edit');
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
}
