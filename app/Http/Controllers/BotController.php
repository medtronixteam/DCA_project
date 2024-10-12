<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    function index() {
        return view('user.bot.index');
    }
}
