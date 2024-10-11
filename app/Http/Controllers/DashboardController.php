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
    }  public function updateName(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        return back()->with('success', 'Name updated successfully.');
    }
    public function updatePassword(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('danger', 'Password changed successfully.');
    }
}
