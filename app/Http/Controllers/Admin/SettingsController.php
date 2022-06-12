<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function index(Request $request, string $type)
    {
        $settings = Setting::query()
            ->whereHas('type', function($query) use ($type) {
                return $query->where('slug', $type);
            })->get();

        return view('admin.pages.settings.general')
            ->with('settings', $settings)
            ->with('settingType', $settings->first()->type);
    }

    public function update(Request $request)
    {
        foreach ($request->all() as $setting => $value) {
            Setting::where('slug', $setting)
                ->update(['value' => $value]);
        }

        Cache::forget('settings');

        return redirect()
            ->back()
            ->with('success', 'Your settings have been saved.');
    }
}
