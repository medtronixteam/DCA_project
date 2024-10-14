<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
class LoginController extends Controller
{
   public function index(){

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }
    public function signup(Request $request){

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        if($request->has('ref')){
            $referId=$request->ref;
            $request->session()->put('referId', $referId);
        }
        return view('signup');
    }


    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
         //    flashy()->success('Login Successfully ...', '#');
            return redirect()->route('dashboard');
        }
       flashy()->error('Invalid Username or Password ', '#');
        return back()->with('error', 'Invalid Username or Password ');
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'You have been log out!');
    }

    public function verifyEmail(){

        return view('verification-email');
    }

    public function registerUser(Request $request) {

        $validatedData = $request->validate([
            "password" => ['required'],
            "name" => ['required', 'string:255'],
            "email" => ['required', 'email:rfc,dns', 'unique:users,email']
        ]);

        if($validatedData){
            $validatedData["password"] = Hash::make($validatedData["password"]);
            $referId=null;
            if(session()->has('referId')){
                $referId=session()->get('referId');
            }
           $user= User::create([

                "password" =>  $validatedData["password"],
                "name" =>  $validatedData["name"],
                "email" =>  $validatedData["email"],
                "status" =>  1,
                "invited_by" => $referId,

            ]);
            Auth::login($user);
         //   $user->sendEmailVerificationNotification();
            flashy()->success('Account has been Created Login Here', '#');
            return redirect()->route('dashboard')->with('success', 'Registered Successful!');

        }

        return back()->with('error', 'Registration failed!');

    }
     public function resetPassword($key){
        return view('admin.users.resetPassword',['key'=>$key]);
    }
    public function resetPasswordCh(Request $request){
        $validatedData = $request->validate([
            "password" => ['required','confirmed','min:3'],
        ]);

        if($validatedData){
           $User=User::find(base64_decode($request->key));
           if ($User) {
                  $User->update(['password'=>Hash::make($validatedData["password"])]);
                  flashy()->info('Password has been Updated!', '#');
            }else{

                flashy()->error('Invalid User Id', '#');

            }
        }
            return back()->with('error', 'Password has been not Updated!');
    }

    function profile() {
        return view('user.profile');
    }
    function settings() {
        return view('user.settings');
    }


}
