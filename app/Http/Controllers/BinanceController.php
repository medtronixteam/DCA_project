<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Http;
use Spatie\Async\Pool;

class BinanceController extends Controller
{
    protected $apiKey;
    protected $apiSecret;

    public function __construct()
    {
        // Your Binance API credentials
        $this->apiKey = env('BINANCE_API_KEY');
        $this->apiSecret = env('BINANCE_API_SECRET');
       // $this->pool = Pool::create();
    }

    // Generate a USDT deposit address for the user
    public function generateUSDTDepositAddress($userId)
    {
        $pool = Pool::create();

        // Add the request to the pool
        $pool[] = async(function () use ($userId) {
        try {
            $response = Http::withHeaders([
                'X-MBX-APIKEY' => $this->apiKey,
            ])->get('https://api.binance.com/sapi/v1/capital/deposit/address', [
                'coin' => 'USDT',
                'network' => 'BSC', // Or other supported networks like TRX, ETH
            ]);

            if ($response->successful()) {
                return $response->json()['address'];
            }else{
                return $response->json()['msg'];
            }


        } catch (Exception $e) {
            return $e->getMessage() ;
        }
    });
    $results = $pool->wait();

    return $results[0] ?? 'too kate';
    }

    // Listen for USDT deposits via Binance WebSocket or REST API polling
    public function listenForDeposit($userId)
    {
        // Example of using WebSocket or REST API for deposits (mocked here)
        $response = Http::withHeaders([
            'X-MBX-APIKEY' => $this->apiKey,
        ])->get('https://api.binance.com/sapi/v1/capital/deposit/hisrec', [
            'coin' => 'USDT',
        ]);

        if ($response->successful()) {
            $deposits = $response->json();

            foreach ($deposits as $deposit) {
                if ($deposit['status'] === 1) { // Confirmed
                    return (object)[
                        'status' => 'confirmed',
                        'amount' => $deposit['amount'],
                    ];
                }
            }
        }

        return null;
    }
}
