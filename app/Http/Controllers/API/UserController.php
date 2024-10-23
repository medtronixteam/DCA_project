<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function inviteLink(){
        $response = [

            'message'=>'',
            'data'=>url('/api/register?ref='.auth('sanctum')->user()->username),
            'status'=>'success',
            'code'=>200,
        ];
    return response($response, $response['code']);
    }
    public function refferals(){
        $refferals=User::where('invited_by',auth('sanctum')->user()->id)->where('status',1)->where('role','user')->latest()->get();
        $response = [
            'message'=>'',
            'data'=>$refferals,
            'status'=>'success',
            'code'=>200,
        ];
    return response($response, $response['code']);
    }
    public function profile(){
         $response = [
            'data'=>auth()->user(),
            'status'=>'success',
            'code'=>200,
        ];
    return response($response, $response['code']);
    }
    public function verification(Request $request)  {

        $request->user()->sendEmailVerificationNotification();
        $response = [
            'message'=>"Verification email has been sent",
            'status'=>'success',
            'code'=>200,
        ];
    return response($response, $response['code']);
    }
}
