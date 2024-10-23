<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use Illuminate\Http\Request;
use App\Services\BinanceService;

class ExchangeController extends Controller
{
    public function showBalance($exchange=null)
    {

        $this->updateBalance();
        if($exchange){
            return $exchange= Exchange::select(['balance','exchange_name'])->where('user_id', auth('sanctum')->user()->id)->where('exchange_name',$exchange)->get();

        }else{
            $exchange= Exchange::select(['balance','exchange_name'])->where('user_id', auth('sanctum')->user()->id);

        }

        return response(['data'=>$exchange->get(), 'status'=>'success','code'=>200], 200);
    }
    public function updateBalance(){
        $exchangeService=new BinanceService();
        $balance = $exchangeService->getBalance();

        if (isset($balance['error'])) {

        }else{
            Exchange::where('user_id', auth('sanctum')->user()->id)->where('exchange_name','binance')->update([
                'balance'=>$balance,
            ]);
        }


    }

}
