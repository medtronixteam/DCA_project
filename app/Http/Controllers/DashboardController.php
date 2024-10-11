<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboardUser() {
        return view('user.dashboard');
    }
    function dashboardAdmin() {
        return view('admin.dashboard');
    }
}
