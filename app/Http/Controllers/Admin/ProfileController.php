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
        $user->update($request->validated());

        return redirect()->back()->with('success', 'Your profile changes have been saved.');
    }
}
