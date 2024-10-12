<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    function dashboardUser() {
        return view('user.dashboard');
    }
    function dashboardAdmin() {
        return view('admin.dashboard');
    }

}
