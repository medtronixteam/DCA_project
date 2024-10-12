<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
class ProfileController extends Controller
{
    public function updateName(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();
        flashy()->info('Name updated successfully.', '#');
        return back();
    }
    public function updatePassword(Request $request) {
        $validatedData = $request->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->password, $user->password)) {
            flashy()->info('Incorrect old password', '#');
            return back();
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        //$user->update(['password' => ]);
        flashy()->info('Password has been updated successfully!', '#');
        return back();
    }

}
