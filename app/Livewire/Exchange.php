<?php

namespace App\Livewire;

use App\Models\Exchange as ModelsExchange;
use Livewire\Component;

class Exchange extends Component
{
    public $exchange;
    public $exchangeOld;
    public $isModalOpened=false;
    public $api_secrect;
    public $api_key;
    public $messageAlert=false;

    public function render()
    {
        $this->exchangeOld=auth()->user()->exchange;
        return view('livewire.exchange');
    }
    public function setExchange($value){
        $this->messageAlert=false;
        $this->exchange=$value;
        $this->api_secrect='';
        $this->api_key='';
        $this->isModalOpened=true;

    }
    public function updateExchange(){
        $exchangeData=ModelsExchange::where('user_id',auth()->id())->where('exchange_name',$this->exchangeOld)->first();
            $this->api_secrect=$exchangeData->exchange_api_secret;
            $this->api_key=$exchangeData->exchange_api_key;
        $this->messageAlert=false;
        $this->exchange=$this->exchangeOld;

        $this->isModalOpened=true;

    }
    public function saveExchange(){
        $this->validate([

            'api_secrect'=>'required',
            'api_key'=>'required'
        ]);
        $user=auth()->user();
        $user->exchange=$this->exchange;
        $user->save();
        ModelsExchange::updateOrCreate([
            'user_id'   => auth()->id(),
        ],[
            'exchange_api_secret' => $this->api_secrect,
            'exchange_api_key' => $this->api_key,
            'exchange_name' => $this->exchange,
        ]);

        $this->messageAlert=true;
    }
    public function back(){
        $this->isModalOpened=false;
    }
}
