<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ccxt\binance;

class PaymentController extends Controller
{
    protected $binance;

    public function __construct()
    {
        // Use sandbox or live API keys depending on the environment
        $apiKey = env('BINANCE_API_KEY_LIVE') ;
        $apiSecret =  env('BINANCE_API_SECRET_LIVE') ;

        $this->binance = new binance([
            'apiKey' => $apiKey,
            'secret' => $apiSecret,
            'enableRateLimit' => true,
            'urls' => [
                'api' => 'https://api.binance.com',
            ],
        ]);
    }

    // Create a deposit address for USDT (same as before)
    public function createUSDTDepositAddress()
    {

        try {
            $address = $this->binance->fetch_deposit_address('USDT', ['network' => 'TRC20']);
            return response()->json([
                'success' => true,
                'address' => $address['address'],
                'network' => $address['network'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    // Check deposit status (same as before)
    public function checkUSDTDepositStatus(Request $request)
    {
        try {
            $depositId = $request->input('depositId');
            $deposit = $this->binance->fetch_deposit($depositId);
            return response()->json([
                'success' => true,
                'status' => $deposit['status'],
                'amount' => $deposit['amount'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
