<?php

namespace App\Helpers;

use Modules\Theme\Entities\Theme;

class ThemeHelper
{
    public static function view($view, $data = [])
    {
        $theme = self::getActiveTheme();
        $path = "themes.{$theme}.{$view}";

        if (view()->exists($path)) {
            return view($path, $data);
        }

        abort(404, "Theme view [$path] not found.");
    }

    public static function asset($path)
    {
        $theme = self::getActiveTheme();
        return asset("themes/{$theme}/{$path}");
    }

    public static function themeSettings()
    {
        return \Illuminate\Support\Facades\Cache::remember('active_theme_model', 300, fn () => Theme::where('is_active', 1)->first());
    }

    private static function getActiveTheme()
    {
        // Fetch the active theme from the database
        $theme = \Illuminate\Support\Facades\Cache::remember('active_theme_name', 300, fn () => Theme::where('is_active', 1)->value('name'));

        if (!$theme) {
            abort(500, "No active theme found in the database.");
        }

        return strtolower($theme);
    }
}