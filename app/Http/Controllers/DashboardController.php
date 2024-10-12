<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    function dashboard() {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    function dashboardUser() {
        return view('user.dashboard');
    }
    function dashboardAdmin() {
        return view('admin.dashboard');
    }

}
