<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSaveRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ThemesController extends Controller
{
    /**
     * Show the profile edit view.
     */
    public function index()
    {
        $breadcrumbs = [
            'crumbs' => [],
            'current' => 'Themes',
        ];

        $themes = collect();
        $directories = Storage::disk('themes')->directories();
        foreach ($directories as $directory) {

            $path = Storage::disk('themes')->path($directory);
            $info = json_decode(file_get_contents($path . '/theme.json'));
            $themes->push($info);
        }
        return View::make('manage.pages.themes')
            ->with('themes', $themes)
            ->with('breadcrumbs', $breadcrumbs);
    }

    /**
     * Update the profile.
     *
     * @param ProfileSaveRequest $request
     * @return void
     */
    public function update(ProfileSaveRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $attributes = array_merge($request->validated(), [
            'avatar' => $request->hasFile('avatar')
                ? base64_encode(file_get_contents($request->file('avatar')->path()))
                : $user->avatar ?? null,
        ]);

        $user->update($attributes);

        return Redirect::back()
            ->with('success', 'Your profile changes have been saved.');
    }
}
