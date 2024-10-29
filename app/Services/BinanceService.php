<?php

namespace App\Services;

use ccxt\binance;

class BinanceService
{
    protected $exchange;

    public function __construct()
    {
        // Initialize the Binance exchange with your API keys
        $this->exchange = new binance([
            'apiKey' => 'rtPNTO0zh67bWDnwlPZ2WfmzheEad1dQB3duvQaRciPY2CwgVqxVFXlZInZ2mGwO',
            'secret' => '0E5f3m9TGFQidu2eWFEmxxVKmabAiXpsTjnwuh1wfmpNAusBUc8LPXnuJAldHYH1',
            'enableRateLimit' => true,
        ]);
    }

    /**
     * Get the user's account balance.
     *
     * @return array
     */
    public function getBalance()
    {
        try {
            // Fetch balance from the exchange
            $balance = $this->exchange->fetch_balance();
            return $balance['free'];
        } catch (\Exception $e) {
            // Handle exceptions or errors
            return ['error' => $e->getMessage()];
        }
    }
}
