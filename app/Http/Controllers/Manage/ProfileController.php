<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSaveRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    /**
     * Show the profile edit view.
     */
    public function edit()
    {
        return View::make('manage.pages.profile.profile_edit')
            ->with('profile', auth()->user());
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
