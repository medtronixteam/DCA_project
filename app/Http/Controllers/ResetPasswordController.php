<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    // Show the password reset form
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    // Handle the password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        // Validate the token and email
        $passwordReset = DB::table('password_resets')
                            ->where('email', $request->email)
                            ->where('token', $request->token)
                            ->first();

        if (!$passwordReset || Carbon::parse($passwordReset->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['email' => 'Invalid or expired reset token.']);
        }

        // Update the user's password
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the token from the password_resets table
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Your password has been reset successfully.');
    }
}
