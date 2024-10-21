<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function inviteLink(){
        $response = [

            'message'=>url('/api/register?ref='.auth('sanctum')->user()->username),
            'status'=>'success',
            'code'=>200,
        ];
    return response($response, $response['code']);
    }
    public function refferals(){
        $refferals=User::where('invited_by',auth('sanctum')->user()->id)->where('status',1)->where('role','user')->latest()->get();
        $response = [
            'message'=>$refferals,
            'status'=>'success',
            'code'=>200,
        ];
    return response($response, $response['code']);
    }
}
