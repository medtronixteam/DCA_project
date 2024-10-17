<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\BinanceController;
use Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = Subscription::all(); // You may define a Plan model if you have predefined plans
        return view('subscription.index', compact('plans'));
    }

    // Handle subscription request
    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $plan = Plan::find($request->plan_id);

        if (!$plan) {
            return back()->with('error', 'Plan not found.');
        }

        // Save subscription details (pending until payment confirmation)
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'plan_name' => $plan->plan_name,
            'price' => $plan->price,
            'status' => 'pending',
        ]);

        // Generate USDT deposit address using Binance API (via a service)
        $binanceService = new BinanceController();
        $depositAddress = $binanceService->generateUSDTDepositAddress($user->id);

        // Show deposit address to the user for payment
        return view('subscription.payment', compact('depositAddress', 'subscription'));
    }

    // Confirm payment after deposit
    public function confirmPayment()
    {
        $user = Auth::user();
        $subscription = $user->subscription()->latest()->first();

        if (!$subscription) {
            return back()->with('error', 'No active subscription found.');
        }

        // Binance service to check for deposit confirmation
        $binanceService = new BinanceController();
        $deposit = $binanceService->listenForDeposit($user->id);

        if ($deposit && $deposit->status == 'confirmed' && $deposit->amount >= $subscription->price) {
            // Update subscription to active
            $subscription->update([
                'status' => 'active',
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
            ]);

            return redirect()->route('subscription.success')->with('success', 'Subscription activated.');
        }

        return back()->with('error', 'Payment not confirmed or insufficient amount.');
    }
}
