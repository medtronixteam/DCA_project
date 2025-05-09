<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\Exchange as ModelsExchange;
use Illuminate\Http\Request;
use Validator;

class BotController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'base_order' => 'required|integer|min:100',
            'order_type' => 'required|in:limit,market',
            'strategy' => 'required|in:long,short',
            'bot_type' => 'required|in:single,multi',
            'bot_name' => 'required|string',
            'deal_start_condition' => 'required|string',
            'exchange' => 'required',

        ]);
        if ($validator->fails()) {
            $messages = $validator->messages()->first();
            $response = ['message' => $messages,
                'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }
        $exchangeCheeck = ModelsExchange::where('exchange_name', $request->exchange)->where('user_id', (auth('sanctum')->id()));
        if ($exchangeCheeck->count() == 0) {
            $response = ['message' => "Please Add Exchange To start the bot",
                'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }
        $validator['user_id'] = auth('sanctum')->user()->id;
        $validator['status'] = 'pending';
        Bot::create($validator);
        $response = ['message' => "Bot has been Created",
            'status' => 'success', 'code' => 200];
        return response($response, $response['code']);
    }
    public function lists()
    {
        $botData = Bot::where("user_id", auth('sanctum')->user()->id)->latest()->get();
        $response = ['data' => $botData,
            'status' => 'success', 'code' => 200];

        return response($response, $response['code']);
    }
    public function delete(Request $request, $botId)
    {

        try {

            Bot::findOrFail($botId)->delete();
            $response = ['message' => "Bot has been Deleted .",
                'status' => 'success', 'code' => 200];

            return response($response, $response['code']);
        } catch (\Throwable $th) {

            $response = ['message' => "Something went wrong .",
                'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }

    }
    public function single($botId)
    {

        try {

            $response = ['message' => "Bot has been found .", 'data' => Bot::findOrFail($botId),
                'status' => 'success', 'code' => 200];
            return response($response, $response['code']);
        } catch (\Throwable $th) {
            $response = ['message' => "Something went wrong .", 'data' => [],
                'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }

    }
    public function stop($botId)
    {

        try {

            Bot::findOrFail($botId)->update('status','stopped');
            $response = ['message' => "Bot has been stopped .",
                'status' => 'success', 'code' => 200];

            return response($response, $response['code']);
        } catch (\Throwable $th) {

            $response = ['message' => "Something went wrong .",
                'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }

    }
    public function start($botId)
    {

        try {

            Bot::findOrFail($botId)->update('status','pending');
            $response = ['message' => "Bot has been started .",
                'status' => 'success', 'code' => 200];

            return response($response, $response['code']);
        } catch (\Throwable $th) {

            $response = ['message' => "Something went wrong .",
                'status' => 'error', 'code' => 500];
            return response($response, $response['code']);
        }

    }

}
