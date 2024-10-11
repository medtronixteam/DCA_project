<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function showForgotForm()
    {
        return view('forget_password');
    }


    public function sendResetLink(Request $request)
    {

        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found in our records.']);
        }
        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $resetLink = route('password.reset', ['token' => $token, 'email' => $request->email]);

        Mail::send('auth.emails.reset', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Reset Your Password');
        });

        return back()->with('status', 'We have emailed your password reset link!');
    }
}
