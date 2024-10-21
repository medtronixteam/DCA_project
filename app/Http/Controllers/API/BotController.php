<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use Illuminate\Http\Request;
use Validator;

{
    function store(Request $request)  {

    $validator = Validator::make($request->all(), [
        'base_order' => 'required|integer',
        'order_type' => 'required',
        'strategy' => 'required',
        'bot_type' => 'required',
        'bot_name' => 'required|string',
        'deal_start_condition' => 'required|string', // assuming string for simplicity

        ]);
     if ($validator->fails()) {
        $messages = $validator->messages()->first();
        $response = ['message' => $messages,
            'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
     }
        if(auth('sanctum')->user()->exchange==''){
            $response = ['message' =>"Please Add Exchange To start the bot",
            'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }
        $validator['exchange']=auth('sanctum')->user()->exchange;
        $validator['user_id']=auth('sanctum')->user()->id;
        $validator['status']='pending';
        Bot::create($validator);
        $response = ['message' =>"Bot has been Created",
        'status' => 'success', 'code' => 200];

        return response($response, $response['code']);
    }
     function lists(){
        $botData=Bot::where("user_id",auth('sanctum')->user()->id)->latest()->get();
        $response = ['message' =>$botData,
        'status' => 'success', 'code' => 200];

        return response($response, $response['code']);
    }

}
