<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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

$createdAt = auth()->user()->created_at;
$dayLeft = Carbon::now()->diffInDays($createdAt);
        return view('user.dashboard',compact('dayLeft'));
    }
    function dashboardAdmin() {
        return view('admin.dashboard');
    }

   public function list(){
    $users=User::all();
    return view('admin.list', compact('users') );
   }

}
