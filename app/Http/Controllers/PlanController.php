<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
class PlanController extends Controller
{
    public function manage(){
        $plans=Plan::all();
        return view('admin.plan',compact('plans'));
    }
    public function changePrice(Request $request)
    {
        $request->validate([
            'price' => 'required',
        ]);

        Plan::updateOrCreate(
            ['name' => $request->name],
            [
                'price' => $request->price,
                'duration' => $request->duration,

            ]
        );

        return response()->json(['status' => 'success','message'=>'Price has been Updated']);
    }

}
