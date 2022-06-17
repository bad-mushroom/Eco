<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PasswordController extends Controller
{
    /**
     * Show change password form.
     */
    public function edit()
    {
        return View::make('admin.pages.profile.password');
    }

    /**
     * Update the password.
     *
     * @param PasswordChangeRequest $request
     */
    public function update(PasswordChangeRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return Redirect::back()
            ->with('success', 'Your password has been changed.');
    }
}
