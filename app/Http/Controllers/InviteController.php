<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function index()
    {
        return view('user.invites.index');
    }
}
