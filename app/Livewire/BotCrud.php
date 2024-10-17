<?php

namespace App\Livewire;

use App\Models\Bot;
use Livewire\Component;

class BotCrud extends Component
{

    public $base_order, $market_type, $bot_name, $deal_start_conditions;
    public $bot_id; // Used for editing
    public $updateMode = false;

    public $ListMode = FALSE;
    public $strategy = 'long';
    public $bot_type = 'single';

    protected $rules = [
        'base_order' => 'required|string',
        'market_type' => 'required|string',
        'strategy' => 'required|string',
        'bot_type' => 'required|string',
        'bot_name' => 'required|string',
        'deal_start_conditions' => 'required|string', // assuming string for simplicity
    ];

    public function render()
    {
        return view('livewire.bot-crud', [
            'bots' => Bot::all(),
        ])->extends('layouts.user');
    }

    // Reset form fields
    private function resetInputFields()
    {
        $this->base_order = '';
        $this->market_type = '';
        $this->strategy = '';
        $this->bot_type = '';
        $this->bot_name = '';
        $this->deal_start_conditions = '';
    }

    // Create a new bot
    public function store()
    {
        $validatedData = $this->validate();

        Bot::create($validatedData);

        session()->flash('message', 'Bot Created Successfully.');

        $this->resetInputFields();
    }

    // Load the bot for editing
    public function edit($id)
    {
        $bot = Bot::findOrFail($id);
        $this->bot_id = $bot->id;
        $this->base_order = $bot->base_order;
        $this->market_type = $bot->market_type;
        $this->strategy = $bot->strategy;
        $this->bot_type = $bot->bot_type;
        $this->bot_name = $bot->bot_name;
        $this->deal_start_conditions = $bot->deal_start_conditions;

        $this->updateMode = true;
    }

    // Update bot details
    public function update()
    {
        $validatedData = $this->validate();

        $bot = Bot::findOrFail($this->bot_id);
        $bot->update($validatedData);

        session()->flash('message', 'Bot Updated Successfully.');

        $this->resetInputFields();
        $this->updateMode = false;
    }

    // Cancel editing mode
    public function cancel()
    {
        $this->resetInputFields();
        $this->updateMode = false;
    }
    public function createMode()
    {
        $this->resetInputFields();
        $this->ListMode = false;
    }
    public function listMode()
    {
        $this->resetInputFields();
        $this->ListMode = true;
    }

    public function changeStrategy($value)
    {
        $this->strategy = $value;
    }
    public function changePair($value)
    {
        $this->bot_type = $value;
    }


    // Delete a bot
    public function delete($id)
    {
        Bot::find($id)->delete();
        session()->flash('message', 'Bot Deleted Successfully.');
    }
}
