<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSaveRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.pages.profile.profile_edit')
            ->with('profile', auth()->user());
    }

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

        return redirect()->back()->with('success', 'Your profile changes have been saved.');
    }
}
