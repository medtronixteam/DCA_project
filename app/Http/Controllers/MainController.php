<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Plan;
use App\Models\User;

class MainController extends Controller
{

    function listPlan() {
        $plans=Plan::all();
        return view('user.subscription',compact('plans'));
    }
    public function listUser(){
        $users=User::all();
        return view('admin.list', compact('users') );
       }
       public function disable($id)
       {
           $user = User::findOrFail($id);
           $user->status = 0;
           $user->save();
           flashy()->info('User disabled successfully', '#');
           return back();
       }

       public function enable($id)
       {
           $user = User::findOrFail($id);
           $user->status = 1;
           $user->save();
           flashy()->info('User enabled successfully', '#');
           return back();
       }
       public function delete($id)
       {
           $user = User::findOrFail($id);
           $user->delete();
           flashy()->info('User deleted successfully', '#');
           return back();
       }
   }
