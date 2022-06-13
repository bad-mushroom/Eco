<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.pages.profile.password');
    }

    public function update(PasswordChangeRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->back()->with('success', 'Your password has been changed.');
    }
}
