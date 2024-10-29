<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class LoginController extends Controller
{

public function login(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {

        $messages = $validator->messages()->first();
        return response()->json([
            'message' => $messages,
            'status' => 'error',
            'code' => 400
        ], 400);
    }
    if (Auth::attempt($request->only('email', 'password'))) {
        // Authentication passed
        $user = Auth::user();
        $token = $user->createToken('my-users-token')->plainTextToken;
        unset($user->id);

        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => "Login successfully.",
            'status' => 'success',
            'code' => 200
        ], 200);
    } else {
        // Authentication failed
        return response()->json([
            'message' => "Invalid email or password.",
            'status' => 'error',
            'code' => 401
        ], 401);
    }
}
    function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required|max:20',
            'invited_by'=>'nullable'

        ]);
     if ($validator->fails()) {
        $messages = $validator->messages()->first();
        $response = ['message' => $messages,
            'status' => 'error', 'code' => 500];

     }else{
        $invited_by=null;
        if($request->has('invited_by')){

            $username=User::where('username',$request->invited_by)->where('status',1);
            if($username->count()==0){

                $response = ['message' =>"Refferal User not found",
                    'status' => 'error', 'code' => 500];
                    return response($response, $response['code']);
            }
            $invited_by=$request->query('invited_by');
            $invited_by=$username->first()->id;
        }
           $user= User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                "status" =>  1,
                "username" =>  User::generateUsername($request->name),
                "invited_by" => $invited_by,
            ]);
            $user->sendEmailVerificationNotification();
            $token = $user->createToken('my-users-token')->plainTextToken;
            unset($user->id);
            unset($user->invited_by);

            $response = [
                'user' => $user,
                'token' => $token,
                'message'=>"Register  Successfully.",
                'status'=>'success',
                'code'=>200,
            ];
        }
        return response($response, $response['code']);
    }
    public function  passwordChange(Request $request)  {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if ($validator->fails()) {

            $messages = $validator->messages()->first();
            $response = ['message' => $messages,
                'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }
        $user = auth('sanctum')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'password does not match','status' => 'error', 'code' => 500], 500);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return response()->json(['message' => 'Password changed successfully','status' => 'success', 'code' => 200], 200);

    }


}
