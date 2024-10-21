<?php

namespace App\Http\Controllers;
use App\Models\Exchange as ModelsExchange;
use Illuminate\Http\Request;
use Validator;
class ExchangeController extends Controller
{

    function addExchange(Request $request)  {
        $validator = Validator::make($request->all(), [
            'api_secrect' => 'required',
            'api_key' => 'required',
            'exchange' => 'required',

            ]);
         if ($validator->fails()) {
            $messages = $validator->messages()->first();
            $response = ['message' => $messages,
                'status' => 'error', 'code' => 500];
                return response($response, $response['code']);
         }

         ModelsExchange::updateOrCreate([
            'user_id'   => auth()->id(),
            'exchange_name'   => $request->exchange,
        ],[
            'exchange_api_secret' => $request->api_secrect,
            'exchange_api_key' => $request->api_key,
            'exchange_name' => $request->exchange,
        ]);


    }
}
