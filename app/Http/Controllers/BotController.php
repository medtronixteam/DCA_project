<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
class BotController extends Controller
{
    function index() {
        return view('user.bot.index');
    }
   
}
