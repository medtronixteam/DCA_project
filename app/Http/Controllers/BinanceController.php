<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Http;

class BinanceController extends Controller
{
    protected $apiKey;
    protected $apiSecret;

    public function __construct()
    {
        // Your Binance API credentials
        $this->apiKey = env('BINANCE_API_KEY');
        $this->apiSecret = env('BINANCE_API_SECRET');
    }

    // Generate a USDT deposit address for the user
    public function generateUSDTDepositAddress($userId)
    {
        try {
            $response = Http::withHeaders([
                'X-MBX-APIKEY' => $this->apiKey,
            ])->get('https://api.binance.com/sapi/v1/capital/deposit/address', [
                'coin' => 'USDT',
                'network' => 'BSC', // Or other supported networks like TRX, ETH
            ]);

            if ($response->successful()) {
                return $response->json()['address'];
            }

            return null;
        } catch (Exception $e) {
            return null;
        }
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
