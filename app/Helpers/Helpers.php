<?php

use App\Enums\ActivationStatusEnum;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Enums\DateFormatEnum;
use App\Enums\AssetsFolderEnum;
use App\Models\NewsMst;
use Modules\Theme\Entities\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Modules\Accounts\Entities\AccCoa;
use Illuminate\Support\Facades\Storage;
use Modules\Localize\Entities\Language;
use Modules\Category\Entities\Category;
use Modules\Accounts\Entities\AccVoucher;
use Modules\Setting\Entities\Application;
use Modules\UserManagement\Entities\PerMenu;
use Modules\Advertisement\Entities\Advertisement;
use Modules\ProbashiJanala\Entities\ProbashiNews;
use Modules\VideoNews\Entities\VideoNews;

/**
 * generate asset url
 */
function custom_asset(?string $file = null, ?string $default = null, ?string $path = null): string
{

    if ($file) {
        return app('url')->asset($path . '/' . $file . '?v=1');
    }

    return $default;
}

/**
 * module asset url
 */
function module_asset(?string $file = null, ?string $default = null): string
{
    return custom_asset($file, $default, 'module-assets');
}

if (!function_exists('age')) {
    function age($dob)
    {
        $age = Carbon::parse($dob)->age;
        return $age . " Years";
    }

}

function parentMenu($menuId)
{
    $menuDetail = PerMenu::where('id', $menuId)->first();

    if (empty($menuDetail)) {
        return null;
    }

    return $menuDetail->menu_name;
}

if (!function_exists('app_setting')) {
    function app_setting()
    {
        $appSetting = Cache::remember('appSetting', 3600, function () {
            return Application::with('currency')->first();
        });

        if (storage_path('app/public/' . $appSetting->logo) && file_exists(storage_path('app/public/' . $appSetting->logo))) {
            $appSetting->logo = asset('storage/' . $appSetting->logo);
        } else {
            $appSetting->logo = asset('assets/logo.png');
        }

        if (storage_path('app/public/' . $appSetting->sidebar_logo) && file_exists(storage_path('app/public/' . $appSetting->sidebar_logo))) {
            $appSetting->sidebar_logo = asset('storage/' . $appSetting->sidebar_logo);
        } else {
            $appSetting->sidebar_logo = asset('assets/logo.png');
        }

        if (storage_path('app/public/' . $appSetting->sidebar_collapsed_logo) && file_exists(storage_path('app/public/' . $appSetting->sidebar_collapsed_logo))) {
            $appSetting->sidebar_collapsed_logo = asset('storage/' . $appSetting->sidebar_collapsed_logo);
        } else {
            $appSetting->sidebar_collapsed_logo = asset('assets/mini-logo.png');
        }

        if (storage_path('app/public/' . $appSetting->favicon) && file_exists(storage_path('app/public/' . $appSetting->favicon))) {
            $appSetting->favicon = asset('storage/' . $appSetting->favicon);
        } else {
            $appSetting->favicon = asset('assets/favicon.png');
        }

        if (storage_path('app/public/' . $appSetting->login_image) && file_exists(storage_path('app/public/' . $appSetting->login_image))) {
            $appSetting->login_image = asset('storage/' . $appSetting->login_image);
        } else {
            $appSetting->login_image = asset('assets/logo.png');
        }

        if (storage_path('app/public/' . $appSetting->footer_logo) && file_exists(storage_path('app/public/' . $appSetting->footer_logo))) {
            $appSetting->footer_logo = asset('storage/' . $appSetting->footer_logo);
        } else {
            $appSetting->footer_logo = asset('assets/footer-logo.png');
        }

        if (storage_path('app/public/' . $appSetting->app_logo) && file_exists(storage_path('app/public/' . $appSetting->app_logo))) {
            $appSetting->app_logo = asset('storage/' . $appSetting->app_logo);
        } else {
            $appSetting->app_logo = asset('assets/logo.png');
        }

        if (storage_path('app/public/' . $appSetting->mobile_menu_image) && file_exists(storage_path('app/public/' . $appSetting->mobile_menu_image))) {
            $appSetting->mobile_menu_image = asset('storage/' . $appSetting->mobile_menu_image);
        } else {
            $appSetting->mobile_menu_image = asset('assets/logo.png');
        }

        return $appSetting;
    }

}

// currencies
if (!function_exists('currency')) {
    function currency()
    {
        $currency = Cache::remember('currency', 3600, function () {
            return app_setting()?->currency->symbol ?? null;
        });
        return $currency;
    }

}

if (!function_exists('logo_64_data')) {
    function logo_64_data()
    {
        // Forever cache
        $appSetting = Cache::remember('appSetting', 3600, function () {
            return Application::first();
        });

        $logo = null;

        if (file_exists(asset($appSetting->logo))) {
            $logo = 'storage/' . $appSetting->logo;
        } else {
            $logo = __DIR__ . "/backend/assets/dist/img/logo-preview.png";
        }

        if (file_exists($logo) && is_readable($logo)) {
            $type   = pathinfo($logo, PATHINFO_EXTENSION);
            $data   = file_get_contents($logo);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $base64;
        } else {
            // Handle error here (e.g., log, return a placeholder image, etc.)
            return null;
        }

    }

}

if (!function_exists('lang_setting')) {
    function lang_setting()
    {
        return cache()->remember('lang_setting', 120, function () {
            return Language::all();
        });
    }

}

if (!function_exists('numberToWords')) {
    function numberToWords($number)
    {
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        return ucwords($f->format($number) . ' ' . app_setting()->currency->title . ' ' . 'Only');
    }

}

if (!function_exists('numberToMillionBillion')) {
    function numberToMillionBillion($number = '')
    {

        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 2) . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 2) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 2) . 'K';
        } else {
            return number_format($number);
        }

    }

}

if (!function_exists('current_date')) {
    function current_date()
    {
        return Carbon::today()->toDateString();
    }

}

if (!function_exists('current_date_for_account')) {
    function current_date_for_account()
    {
        $startDate = Carbon::today()->format('d/m/Y');
        $endDate   = Carbon::today()->addDays(30)->subDay()->format('d/m/Y');

        return $startDate . ' - ' . $endDate;
    }

}

if (!function_exists('getVouchersByNo')) {
    function getVouchersByNo($voucher_no)
    {
        $vouchers = Cache::remember($voucher_no, 3600, function () use ($voucher_no) {
            return AccVoucher::where('voucher_no', $voucher_no)->get();
        });

        return $vouchers;
    }

}

if (!function_exists('orderByData')) {
    function orderByData($req = null)
    {
        $orderBY = "DESC";

        if ($req != null && ($req[0]["dir"] == "desc")) {
            $orderBY = "ASC";
        }

        return $orderBY;
    }

}

if (!function_exists('bt_number_format')) {
    function bt_number_format($number)
    {
        $type                 = app_setting()->floating_number;
        $negative_symbol_type = app_setting()->negative_amount_symbol;
        $negative             = false;

        if ($number < 0) {
            $negative = true;
            $number   = (float) $number * -1;
        }

        if ($type == 1) {

            if ($negative_symbol_type == 2) {

                if ($negative) {
                    return '(' . number_format((float) (preg_replace('/[^\d.]/', '', $number)), 0, '.', ',') . ')';
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 0, '.', ',');
                }

            } else {

                if ($negative) {
                    return number_format(-(float) (preg_replace('/[^\d.]/', '', $number)), 0, '.', ',');
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 0, '.', ',');
                }

            }

        } elseif ($type == 2) {

            if ($negative_symbol_type == 2) {

                if ($negative) {
                    return '(' . number_format((float) (preg_replace('/[^\d.]/', '', $number)), 1, '.', ',') . ')';
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 1, '.', ',');
                }

            } else {

                if ($negative) {
                    return number_format(-(float) (preg_replace('/[^\d.]/', '', $number)), 1, '.', ',');
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 1, '.', ',');
                }

            }

        } elseif ($type == 3) {

            if ($negative_symbol_type == 2) {

                if ($negative) {
                    return '(' . number_format((float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',') . ')';
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',');
                }

            } else {

                if ($negative) {
                    return number_format(-(float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',');
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',');
                }

            }

        } elseif ($type == 4) {

            if ($negative_symbol_type == 2) {

                if ($negative) {
                    return '(' . number_format((float) (preg_replace('/[^\d.]/', '', $number)), 3, '.', ',') . ')';
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 3, '.', ',');
                }

            } else {

                if ($negative) {
                    return number_format(-(float) (preg_replace('/[^\d.]/', '', $number)), 3, '.', ',');
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 3, '.', ',');
                }

            }

        } else {

            if ($negative_symbol_type == 2) {

                if ($negative) {
                    return '(' . number_format((float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',') . ')';
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',');
                }

            } else {

                if ($negative) {
                    return number_format(-(float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',');
                } else {
                    return number_format((float) (preg_replace('/[^\d.]/', '', $number)), 2, '.', ',');
                }

            }

        }

    }

}

if (!function_exists('isBankNature')) {
    function isBankNature($id)
    {
        $nature = AccCoa::select('is_bank_nature', 'id')->where('id', $id)->where('is_bank_nature', 1)->first();

        if ($nature) {
            return true;
        } else {
            return false;
        }

    }

}

if (!function_exists('check_expiry')) {
    function check_expiry(string $expiry_date, int $interval = null): bool
    {
        $today = Carbon::today();

        if ($interval) {
            $interval_date = Carbon::today()->addDays($interval);
            $expiry        = Carbon::parse($expiry_date)->lte($interval_date);

            if ($expiry && Carbon::parse($expiry_date)->gt($today)) {
                return true;
            } else {
                return false;
            }

        } else {
            $expiry = Carbon::parse($expiry_date)->lt($today);
        }

        return $expiry;
    }

}

if (!function_exists('check_expiry')) {
    function check_expiry(string $expiry_date, int $interval = null): bool
    {
        $today = Carbon::today();

        if ($interval) {
            $interval_date = Carbon::today()->addDays($interval);
            $expiry        = Carbon::parse($expiry_date)->lte($interval_date);

            if ($expiry && Carbon::parse($expiry_date)->gt($today)) {
                return true;
            } else {
                return false;
            }

        } else {
            $expiry = Carbon::parse($expiry_date)->lt($today);
        }

        return $expiry;
    }

}

/**
 * Convert size to human readable format (KB, MB, GB, TB, PB)
 */
function size_convert(int $size): string
{
    $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];

    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}

/**
 * Activity Log Now
 *
 * @param  mixed  $user
 */
function logNow(array $response = [], string $name = 'Default', string $log = 'error', string $user = null): void
{

    if (!$user) {
        $user = auth()->user();
    }

    activity()
        ->causedBy($user)
        ->withProperties([
            'url'      => request()->fullUrl(),
            'method'   => request()->method(),
            'input'    => request()->all(),
            'response' => $response,
        ])
        ->useLog($name)
        ->log($log);
}

/**
 * Get The Localize Data From File
 */
function localize(?string $key, ?string $default_value = null, ?string $locale = null): ?string
{

    if (is_null($key) || $key == '' || $key == ' ' || empty($key)) {
        return '';
    }

    return \App\Facades\Localizer::localize($key, $default_value, $locale);
}

/**
 * Get The Localize Upper Case First Word
 */
function localize_uc(string $string): string
{
    return ucwords(localize($string));
}

/**
 * Get The Localize Upper Case First Word
 */
function localize_lower(string $string): string
{
    return strtolower(localize($string));
}

/**
 * Get The Localize Data From File
 */
function ___(?string $key, ?string $default_value = null, ?string $locale = null): ?string
{
    return localize($key, $default_value, $locale);
}

/**
 * Get The Localize Data From File
 */
function get_phrases(?string $key, ?string $default_value = null, ?string $locale = null): ?string
{
    return localize($key, $default_value, $locale);
}

if (!function_exists("makeString")) {

    function makeString($data = [])
    {
        $output = "";
        $i      = 0;

        foreach ($data as $val) {
            $output .= ($i > 0 ? " " : "");
            $output .= localize("$val");
            $i++;
        }

        return $output;
    }

}

if (!function_exists('generate_positions')) {

    function generate_positions($start, $end)
    {
        $positions = [];

        for ($i = $start; $i <= $end; $i++) {
            $positions[] = $i;
        }

        return $positions;
    }

}

if (!function_exists('get_date_picker_format')) {
    /**
     * Get date format for javascript
     *
     * @return string
     */
    function get_date_picker_format(): string
    {
        return DateFormatEnum::YYYY_MM_DD->value;
    }

}

if (!function_exists('get_date_format')) {
    /**
     * Get date format
     *
     * @return string
     */
    function get_date_format(): string
    {
        return DateFormatEnum::MM_DD_YYYY->value;
    }

}

/**
 * Return all public asset form public/assets folder
 */

if (!function_exists('assets')) {
    function assets($file = ''): string
    {
        return asset(AssetsFolderEnum::PUBLIC_ASSETS->value . '/' . $file);
    }

}

/**
 * Return all uploaded asset from public/storage
 */

if (!function_exists('storage_asset_image')) {
    function storage_asset_image($file = ''): string
    {

        if (!file_exists(storage_path('app/public/' . $file))) {
            return asset('/assets/default.jpg');
        }

        return asset(AssetsFolderEnum::STORAGE_ASSETS->value . '/' . $file);
    }

}

/**
 * Set success message
 *
 * @param string $message
 *
 * @return void
 */

if (!function_exists('success_message')) {

    function success_message(string $message): void
    {
        toast($message, 'success');
    }

}

/**
 * Set error message
 *
 * @param string $message
 *
 * @return void
 */

if (!function_exists('error_message')) {

    function error_message(string $message): void
    {
        toast($message, 'error');
    }

}

/**
 * Set warning message
 *
 * @param string $message
 *
 * @return void
 */

if (!function_exists('warning_message')) {

    function warning_message(string $message): void
    {
        toast($message, 'warning');
    }

}

/**
 * Write an array of key/value pairs to a .env file
 *
 * @param array $env
 *
 * @return void
 */

if (!function_exists('writeEnvFile')) {
    function writeEnvFile(array $env, $path = __DIR__ . '/../../.env'): void
    {
        $str = file_get_contents($path);

        /**
         * replace the value of the specific key or create a new key
         */

        foreach ($env as $key => $value) {

            /**
             * if value is true or false
             */

            if ($value == 'true' || $value == 'false') {
                $key_value = "$key=$value";
            } else {
                $key_value = "$key=";

                if ($value && is_numeric($value)) {
                    $key_value .= $value;
                } elseif ($value) {
                    $key_value .= "\"$value\"";
                }

            }

            /**
             * check if key exists
             */

            if (strpos($str, $key) !== false) {
                $str = preg_replace("/^$key=.*/m", $key_value, $str);
            } else {
                $str .= $key_value . PHP_EOL;
            }

        }

        file_put_contents($path, $str);
        // forget mail config cache
        \Illuminate\Support\Facades\Artisan::call('config:cache');
    }

}

/**
 * Check the existence of file in filesystem
 *
 * @param  string|null  $filename
 *
 * @return bool|false
 */

if (!function_exists('storage_exist')) {
    /**
     * Check the existence of file in filesystem
     *
     * @param string|null $filename
     * @return bool|false
     */
    function storage_exist(string $filename = null): bool
    {
        $uploadDisk = config('filesystems.default', 'local');

        return !empty($filename) && Storage::disk($uploadDisk)->exists($filename);
    }

}

/**
 * Check the existence of file in filesystem
 *
 * @param  string|null  $filename
 *
 * @return bool|false
 */

if (!function_exists('current_file_system_disk')) {
    /**
     * Check the existence of file in filesystem
     *
     * @param string|null $filename
     * @return string
     */
    function current_file_system_disk(string $filename = null): string
    {
        return $file_system_disk ?? config('filesystems.default', 'local');
    }

}

// return success response
if (!function_exists('sendSuccessResponse')) {
    function sendSuccessResponse($message, $result, $code=200){
        $resposnse = [
            'status'    => true,
            'code'      => $code,
            'message'   => $message,
            'data'      => $result
        ];
        return response()->json($resposnse, $code);
    }
}

// return errore Response
if (!function_exists('sendErrorResponse')) {
    function sendErrorResponse($errorMessage, $errorData=null, $code=404){

        $resposnse = [
            'status'   => false,
            'code'      => $code,
            'message'   => $errorMessage,
            'data'      => @$errorData
        ];

        return response()->json($resposnse, $code);
    }
}

if (!function_exists('baseUrl')) {
    function baseUrl()
    {
        return url('').'/';
    }
}

if (!function_exists("enTobn")) {

    function enTobn ($input)
    {

        $en =array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "hour", "day", "week", "month", "year", "ago", "from now","minute");
        $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'ঘন্টা', 'দিন', 'সপ্তাহ', 'মাস', 'বছর','আগে','আগে','মিনিট');
        $convertedDATE = str_replace($en, $bn, $input);
        $convertedDATE = str_replace('s', '', $convertedDATE);

        return "$convertedDATE";

    }

}

if (!function_exists("removeSpecialCharacters")) {
    /**
     * Remove Special Characters
     *
     * @param string $string
     * @return string
     */
    function removeSpecialCharacters(string $string): string
    {
        // Normalize the string (if necessary)
        $string = mb_strtolower($string, 'UTF-8');

        // Replace spaces and special characters with hyphens
        $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', $string);

        // Remove any leading or trailing hyphens
        $slug = trim($slug, '-');

        return $slug;
    }
}

function convertToSlug($string)
{
    // Convert to lowercase
    $string = mb_strtolower($string, 'UTF-8');

    // Replace any character that is not a Unicode letter, number, or hyphen with a space
    $string = preg_replace('/[^\p{L}\p{N}-]+/u', ' ', $string);

    // Replace multiple spaces or hyphens with a single hyphen
    $string = preg_replace('/[\s-]+/', '-', $string);

    // Trim hyphens from the beginning and end of the string
    $string = trim($string, '-');

    return $string;
}

if (!function_exists('__url')) {
    function __url($path = '') {
        $lang = app()->getLocale();

        // Don't prefix default language
        $defaultLang = Modules\Setting\Entities\Language::getDefault()->value;
        if ($lang === $defaultLang) {
            return url($path);
        }

        return url($lang . '/' . ltrim($path, '/'));
    }
}

if (!function_exists('__url_story')) {
    function __url_story($directory = '', $path = '') {
        $lang = app()->getLocale();

        // Don't prefix default language
        $defaultLang = Modules\Setting\Entities\Language::getDefault()->value;
        if ($lang === $defaultLang) {
            return url($directory .'/'. $path);
        }

        return url($directory .'/'. $lang . '/' . ltrim($path, '/'));
    }
}

if (!function_exists('get_language_id')) {
    function get_language_id()
    {
        // Get the current locale
        $locale = app()->getLocale();

        // Find the language record based on the locale
        $language = Language::where('value', $locale)->first();

        // Return the language ID or null if not found
        return $language ? $language->id : null;
    }
}

if (!function_exists('news_publish_date_format')) {
    /**
     * Format a date using the current app locale (translated month + localized digits if needed).
     *
     * @param  string|null  $date
     * @param  string  $format
     * @param  bool    $showTime
     * @return string|null
     */
    function news_publish_date_format(?string $date, string $format = 'F d, Y', bool $showTime = false): ?string
    {
        if (!$date) {
            return null;
        }

        $locale = app()->getLocale();
        Carbon::setLocale($locale);
        $carbonDate = Carbon::parse($date);

        if ($showTime) {
            $format .= ', h:i A';
        }

        $formatted = $carbonDate->translatedFormat($format);

        // If the language uses non-English numerals, localize digits
        return convert_digits_to_locale($formatted, $locale);
    }
}

if (!function_exists('convert_digits_to_locale')) {
    /**
     * Convert English digits to locale-specific numerals only if needed.
     *
     * @param string $string
     * @param string $locale
     * @return string
     */
    function convert_digits_to_locale(string $string, string $locale): string
    {
        if ($locale === 'bn') {
            // Map Western digits to Bengali digits
            $western = ['0','1','2','3','4','5','6','7','8','9'];
            $bengali = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
            return str_replace($western, $bengali, $string);
        }

        // Fallback for other locales using NumberFormatter
        if (!class_exists(\NumberFormatter::class)) return $string;

        return preg_replace_callback('/\d+/', function ($matches) use ($locale) {
            $formatter = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);
            $formatter->setAttribute(\NumberFormatter::GROUPING_USED, false);
            return $formatter->format($matches[0]);
        }, $string);
    }
}

if (!function_exists('views_format')) {
    /**
     * Format total views to K (thousands) or M (millions).
     *
     * @param int $views
     * @return string
     */
    function views_format(int|string|null $views): string
    {
        // Ensure we always have an integer
        $views = (int) ($views ?? 0);

        if ($views >= 1000000) {
            return number_format($views / 1000000, 2) . 'M';
        } elseif ($views >= 1000) {
            return number_format($views / 1000, 2) . 'K';
        }

        return (string) $views;
    }
}

if (!function_exists('get_image_url')) {
    /**
     * Get the correct image URL, checking storage and public paths.
     *
     * @param string $defaultPath Default image path (relative to the public folder).
     * @param string|null $dbImagePath Image path from the database (relative to the storage folder).
     * @return string
     */
    function get_image_url(string $defaultPath, ?string $dbImagePath = null): string
    {
        // Check if the DB image exists in storage
        if ($dbImagePath && file_exists(storage_path('app/public/' . $dbImagePath))) {
            return asset('storage/' . $dbImagePath);
        }

        // Check if the default path exists
        if (file_exists(public_path($defaultPath))) {
            return asset($defaultPath);
        }

        // Fallback to a final default image
        return asset('/assets/default.jpg');
    }
}

if (!function_exists('bgColorStyle')) {
    function bgColorStyle($colorCode)
    {
        // Ensure the color code is valid (e.g., #F65050 or F65050)
        $color = ltrim($colorCode, '#');
        if (preg_match('/^[0-9a-fA-F]{6}$/', $color)) {
            return 'style="background-color: #' . $color . ';"';
        }

        // Fallback to a default color if the code is not valid
        return 'style="background-color: #F65050;"';
    }
}

if (!function_exists('clean_news_content')) {
    function clean_news_content($value)
    {
        $clean = strip_tags($value);

        // First decode common entities
        $decoded = html_entity_decode($clean, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Decode any lingering numeric or named entities
        $decoded = preg_replace_callback('/&#(\d+);/', function ($matches) {
            return mb_convert_encoding(pack('n', $matches[1]), 'UTF-8', 'UTF-16BE');
        }, $decoded);

        return mb_convert_encoding($decoded, 'UTF-8', 'UTF-8');
    }
}

if (!function_exists('get_advertisements')) {
    function get_advertisements(int $page, int $position)
    {
        $languageId = get_language_id();

        return Advertisement::select('embed_code')
            ->with('themeRelation')
            ->where('language_id', $languageId)
            ->where('page', $page)
            ->where('ad_position', $position)
            ->whereHas('themeRelation', function ($query) {
                $query->where('is_active', 1);
            })
            ->first();
    }
}

if (!function_exists('mode')) {
    /**
     * Check if the current mode is dark.
     * @return bool
     */
    function mode(): bool
    {
        return session()->has('mode') && session('mode') === "dark";
    }
}

function activeTheme()
{
    // Fetch the active theme from the database
    $theme = Theme::where('is_active', 1)->value('name');

    if (!$theme) {
        abort(500, "No active theme found in the database.");
    }

    return strtolower($theme);
}

if (!function_exists('news_time_ago')) {
    /**
     * Always return "ago"-style localized time difference for news,
     * even for future dates.
     *
     * @param  string|null  $date
     * @return string|null
     */
    function news_time_ago(?string $date): ?string
    {
        if (!$date) {
            return null;
        }

        $locale = app()->getLocale();
        Carbon::setLocale($locale);

        $carbonDate = Carbon::parse($date);
        $now = now();

        // Get the absolute difference without "ago" or "from now"
        $diff = $carbonDate->diffForHumans($now, true);

        // Get localized "ago" (make sure it exists in lang JSON)
        $agoWord = localize('ago');

        // Combine manually
        return convert_digits_to_locale("{$diff} {$agoWord}", $locale);
    }
    
    function bengaliToReverseAvro($text)
    {
        // independent vowels
        $vowels = [
            'অ' => 'a',
            'আ' => 'aa',
            'ই' => 'i',
            'ঈ' => 'ii',
            'উ' => 'u',
            'ঊ' => 'uu',
            'ঋ' => 'ri',
            'এ' => 'e',
            'ঐ' => 'ai',
            'ও' => 'o',
            'ঔ' => 'ou',
        ];

        // consonants (basic approximations)
        $consonants = [
            'ক' => 'k', 'খ' => 'kh', 'গ' => 'g', 'ঘ' => 'gh', 'ঙ' => 'ng',
            'চ' => 'ch', 'ছ' => 'chh', 'জ' => 'j', 'ঝ' => 'jh', 'ঞ' => 'ny',
            'ট' => 'tt', 'ঠ' => 'tth', 'ড' => 'dd', 'ঢ' => 'ddh', 'ণ' => 'nn',
            'ত' => 't', 'থ' => 'th', 'দ' => 'd', 'ধ' => 'dh', 'ন' => 'n',
            'প' => 'p', 'ফ' => 'ph', 'ব' => 'b', 'ভ' => 'bh', 'ম' => 'm',
            'য' => 'j', 'র' => 'r', 'ল' => 'l', 'শ' => 'sh', 'ষ' => 'ssh', 'স' => 's', 'হ' => 'h',
            // additional/nukta-like forms
            'ড়' => 'rr', 'ড়' => 'rr', 'ঢ়' => 'rrh', 'ঢ়' => 'rrh',
            // both forms of ya-yaphala / y-variants
            'য়' => 'y', 'য়' => 'y',
            // the "nukta" modified consonants may appear as separate chars; keep them if present
        ];

        // matras (vowel signs)
        $matras = [
            'া' => 'a',
            'ি' => 'i',
            'ী' => 'ii',
            'ু' => 'u',
            'ূ' => 'uu',
            'ৃ' => 'ri',
            'ে' => 'e',
            'ৈ' => 'ai',
            'ো' => 'o',
            'ৌ' => 'ou',
        ];

        // specials and diacritics
        $special = [
            'ৎ' => 't',   // khanda ta
            'ং' => 'ng',  // anusvara
            'ঃ' => 'h',   // visarga
            'ঁ' => 'n',   // chandrabindu (approx)
            '্' => '__VIRAMA__', // placeholder; handled in logic (no sound)
        ];

        // digits
        $digits = [
            '০' => '0', '১' => '1', '২' => '2', '৩' => '3', '৪' => '4',
            '৫' => '5', '৬' => '6', '৭' => '7', '৮' => '8', '৯' => '9',
        ];

        // Merge maps for quick lookups where appropriate (we don't include virama in merge,
        // because virama affects logic rather than producing output)
        $bengaliMap = array_merge($vowels, $consonants, $matras, $special, $digits);

        $result = '';
        $len = mb_strlen($text, 'UTF-8');

        for ($i = 0; $i < $len; $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');

            // Direct digit or independent vowel or standalone special (like anusvara) or standalone matra
            if (isset($vowels[$char]) || isset($special[$char]) || isset($digits[$char])) {
                // If special is virama placeholder, skip (it should never appear alone here)
                if ($char === '্') {
                    continue;
                }
                $result .= $bengaliMap[$char];
                continue;
            }

            // If char is a consonant
            if (isset($consonants[$char])) {
                $cons = $consonants[$char];

                // Lookahead safely
                $next = ($i + 1 < $len) ? mb_substr($text, $i + 1, 1, 'UTF-8') : null;

                // If next is virama (hoshonto) -> consonant cluster, no inherent vowel
                if ($next === '্') {
                    $result .= $cons;
                    // skip the virama (increment i to skip it; loop will process the next consonant)
                    $i++;
                    // continue to next char (which should be consonant or may be something else)
                    continue;
                }

                // If next is a matra -> attach mapped vowel and consume matra
                if ($next !== null && isset($matras[$next])) {
                    $result .= $cons . $matras[$next];
                    $i++; // consume matra
                    continue;
                }

                // If next is a diacritic like chandrabindu / anusvara / visarga -> treat vowel then combine
                if ($next !== null && isset($special[$next]) && $next !== '্') {
                    // inherent vowel + diacritic
                    $result .= $cons . 'a' . $special[$next];
                    $i++; // consume the diacritic
                    continue;
                }

                // Otherwise, use the inherent vowel 'a'
                $result .= $cons . 'a';
                continue;
            }

            // If char is a matra appearing standalone (rare/wrong Unicode order) — attach to previous if possible
            if (isset($matras[$char])) {
                // If result is not empty and previous transliteration ends with a consonant without vowel,
                // this is tricky — we will just append the matra letter (best-effort)
                $result .= $matras[$char];
                continue;
            }

            // Fallback: if we have a direct mapping in merged map, use that
            if (isset($bengaliMap[$char])) {
                $result .= $bengaliMap[$char];
                continue;
            }

            // Keep ASCII / punctuation / spaces as-is (you may want to normalize later in slug)
            $result .= $char;
        }

        return $result;
    }

    function generateSlug($title)
    {
        $hasBengali = preg_match('/[\x{0980}-\x{09FF}]/u', $title);

        if ($hasBengali) {
            $title = bengaliToReverseAvro($title);
        }

        // Convert to lowercase
        $slug = mb_strtolower($title, 'UTF-8');

        // Replace any non-alphanumeric (keep hyphen) with hyphen
        // Keep strictly ASCII English letters, numbers, and hyphen
        $slug = preg_replace('/[^a-zA-Z0-9\-]+/u', '-', $slug);

        // Trim and replace multiple hyphens with single
        $slug = preg_replace('/-+/', '-', trim($slug, '-'));

        return $slug;
    }


}

if (!function_exists('manageVideoUrl')) {
    function manageVideoUrl($url)
    {
        $src = null;
        $renderType = null;
        $thumb = null;

        if (Str::contains($url, ['youtube.com/watch?v=', 'youtu.be'])) {
            // YouTube video
            $videoId = '';

            if (Str::contains($url, 'watch?v=')) {
                $videoId = explode('watch?v=', $url)[1];
                $videoId = explode('&', $videoId)[0];
            } elseif (Str::contains($url, 'youtu.be/')) {
                $videoId = explode('youtu.be/', $url)[1];
            }

            $src = "https://www.youtube.com/embed/$videoId?enablejsapi=1&controls=1&modestbranding=1&rel=0";
            $thumb = "https://img.youtube.com/vi/$videoId/hqdefault.jpg";
            $renderType = 'iframe';

        } elseif (Str::contains($url, 'youtube.com/embed')) {
            // Already an embed URL
            preg_match('/embed\/([^\?]+)/', $url, $matches);
            $videoId = $matches[1] ?? null;
            $src = $url;
            $thumb = $videoId ? "https://img.youtube.com/vi/$videoId/hqdefault.jpg" : null;
            $renderType = 'iframe';

        } elseif (Str::contains($url, 'vimeo.com')) {
            // Vimeo: need to fetch thumbnail using API
            $videoId = null;
            if (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
                $videoId = $matches[1];
                $src = "https://player.vimeo.com/video/$videoId";
                try {
                    $vimeoData = json_decode(file_get_contents("https://vimeo.com/api/v2/video/$videoId.json"));
                    $thumb = $vimeoData[0]->thumbnail_large ?? null;
                } catch (\Exception $e) {
                    $thumb = null;
                }
            }
            $renderType = 'iframe';

        } elseif (Str::endsWith($url, '.mp4')) {
            $src = $url;
            $thumb = null; // no auto thumb for MP4
            $renderType = 'video';
        }

        return [
            'src' => $src,
            'type' => $renderType,
            'thumb' => $thumb,
        ];
    }
}


if (!function_exists('get_probashi_news')) {
    function get_probashi_news($limit = 3)
    {
        $languageId = get_language_id();

        return ProbashiNews::select('id', 'title', 'thumbnail_image', 'image_alt', 'publish_date', 'encode_title')
            ->with(['thumbnails' => function ($query) {
                $query->select('id', 'probashi_news_id', 'thumbnail_path', 'frame_time')
                      ->orderBy('frame_time', 'asc');
            }])
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE->value)
            ->orderBy('id', 'desc')
            ->take($limit)
            ->get();
    }
}

if (!function_exists('get_last_podcast')) {

    function get_last_podcast()
    {
        return Cache::remember('latest_podcast', 3600, function () {

            $defaultVideoId = '03Kk_pGgPng';

            $defaultData = [
                'title' => 'Latest Podcast',
                'description' => '',
                'thumbnail' => "https://i.ytimg.com/vi/{$defaultVideoId}/hqdefault.jpg",
                'video_id' => $defaultVideoId,
                'embed_url' => "https://www.youtube.com/embed/{$defaultVideoId}",
                'youtube_url' => "https://www.youtube.com/watch?v={$defaultVideoId}",
                'published_at' => null,
            ];

            try {

                $apiKey = config('services.youtube.api_key');
                $playlistId = config('services.youtube.playlist_id');

                $response = Http::timeout(15)->get(
                    'https://www.googleapis.com/youtube/v3/playlistItems',
                    [
                        'part' => 'snippet',
                        'maxResults' => 1,
                        'playlistId' => $playlistId,
                        'key' => $apiKey,
                    ]
                );

                if (!$response->successful()) {

                    \Log::error('YouTube API Error', [
                        'response' => $response->json()
                    ]);

                    return $defaultData;
                }

                $item = $response->json('items.0');

                if (!$item) {
                    return $defaultData;
                }

                $videoId = $item['snippet']['resourceId']['videoId'] ?? $defaultVideoId;

                return [
                    'title' => $item['snippet']['title'] ?? 'Latest Podcast',
                    'description' => $item['snippet']['description'] ?? '',
                    'thumbnail' =>
                        $item['snippet']['thumbnails']['high']['url']
                        ?? $item['snippet']['thumbnails']['medium']['url']
                        ?? $item['snippet']['thumbnails']['default']['url']
                        ?? "https://i.ytimg.com/vi/{$videoId}/hqdefault.jpg",

                    'video_id' => $videoId,

                    'embed_url' => "https://www.youtube.com/embed/{$videoId}",

                    'youtube_url' => "https://www.youtube.com/watch?v={$videoId}",

                    'published_at' => $item['snippet']['publishedAt'] ?? null,
                ];

            } catch (\Throwable $e) {

                \Log::error('YouTube Podcast Fetch Error', [
                    'message' => $e->getMessage()
                ]);

                return $defaultData;
            }
        });
    }
}

if (!function_exists('get_probash_category_news')) {
    function get_probash_category_news($limit = 3)
    {
        $languageId = get_language_id();
        $categoryId = Category::query()
            ->where('language_id', $languageId)
            ->whereIn('slug', ['প্রবাসী', 'probashi', 'probash'])
            ->value('id');

        if (empty($categoryId)) {
            $categoryId = Category::query()
                ->where('language_id', $languageId)
                ->where(function ($query) {
                    $query->where('category_name', 'like', '%প্রবাস%')
                        ->orWhere('category_name', 'like', '%Probashi%')
                        ->orWhere('category_name', 'like', '%Probash%');
                })
                ->value('id');
        }

        if (empty($categoryId)) {
            $categoryId = $languageId == 17 ? 92 : 91;
        }

        $featuresNews = NewsMst::with(['postByUser:id,full_name', 'comments'])
            ->select(['id', 'news_id', 'encode_title', 'title', 'image', 'image_base_url', 'image_alt', 'image_title', 'publish_date', 'post_by'])
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('category_id', $categoryId)
            ->where('status', 1)
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->limit($limit)
            ->get();

        return $featuresNews;
    }
}

if (!function_exists('get_tv_news')) {
    function get_tv_news($limit = 3)
    {
        $languageId = get_language_id();

        if (activeTheme() == 'news') {
            $limit = 10;
        } elseif (activeTheme() == 'magazine') {
            $limit = 4;
        }

        $videoNews = VideoNews::select([
                'id',
                'publish_date',
                'encode_title',
                'title',
                'thumbnail_image',
                'image_alt',
                'image_title',
                'created_by',
                'video',
                'video_url',
                'thumbnail_video',
                'qr_code',
            ])
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->where('is_tv_news', 1)
            ->latest('created_at')
            ->take($limit)
            ->get();
        return $videoNews;
    }
}
