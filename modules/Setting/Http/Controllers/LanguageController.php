<?php

namespace Modules\Setting\Http\Controllers;

use App\Scopes\Asc;
use App\Exports\LangExport;
use App\Imports\LangImport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Setting\Entities\Language;
use Illuminate\Support\Facades\Storage;
use Modules\Setting\Http\Requests\LanguageRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_language_list')->only('index');
        $this->middleware('permission:create_language_list')->only(['store']);
        $this->middleware('permission:update_language_list')->only(['update']);
        $this->middleware('permission:delete_language_list')->only(['deleteFile']);
        $this->middleware(['demo'])->only(['store','update','deleteFile']);
    }

    public function index()
    {
        return view('setting::language.index', [
            'languages' => Language::withoutGlobalScopes([Asc::class])->get(),
        ]);
    }

    public function store(LanguageRequest $request)
    {
        return response()->json([
            'error' => 'The portal is fixed to Bangla and cannot add another language.',
        ], 422);
    }

    public function edit(Request $request, $slug)
    {

        $lang = Language::where('slug', $slug)->first();
        $url = base_path() . '/lang/' . $lang->slug . '.json';
        $result = file_get_contents($url);
        $results = json_decode($result);

        return view('setting::language.edit-pharse', [
            'results' => $results,
            'lang' => $lang,
        ]);
    }

    public function update(Request $request, $slug)
    {
        $lang = Language::where('slug', $slug)->first();
        $key = [];
        for ($i = 0; $i < count($request->key); $i++) {
            $key[$request->key[$i]] = $request->label[$i];
        }
        $result = json_encode($key, true);
        $file = base_path() . '/lang/' . $lang->slug . '.json';
        $this->deleteFile($file);
        $file = $lang->slug . '.json';
        $destination = base_path() . "/lang/";
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }
        File::put($destination . $file, $result);
        return redirect()->route('settings.index')->with('success', 'Data updated successfully');
    }

    public function status($id)
    {
        Language::whereKey($id)->update(['status' => 1]);

        return redirect()->back()->with('success', 'Bangla remains the active portal language.');
    }

    private function deleteFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
