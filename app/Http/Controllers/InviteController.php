<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function index()
    {
       $invitedUsers= User::where('role', 'user')->where('invited_by', auth()->user()->id)->get();
        return view('user.invites.index',compact('invitedUsers'));
    }
}
