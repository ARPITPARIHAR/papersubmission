<?php

use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('businessSetting')) {
    function businessSetting($id = 1)
    {
        return Cache::remember('business-setting-' . $id, 86400, function () use ($id) {
            return BusinessSetting::find($id);
        });
    }
}
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (request()->route()->getName() == $route) return $output;
        }
    }
}
// Additional helper functions...
