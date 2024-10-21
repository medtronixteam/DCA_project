<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Google2FA;
use Illuminate\Support\Facades\Redirect;

class Google2FAController extends Controller
{
    protected $google2fa;

    public function __construct(Google2FA $google2fa)
    {
        $this->google2fa = $google2fa;
    }

    // Step 5: Show 2FA Setup Page
    public function setup()
    {
        $user = Auth::user();

        // if ($user->google2fa_secret) {
        //     return redirect()->route('2fa.verify');
        // }

        // Generate a secret key for the user
        $secret = $this->google2fa->generateSecretKey();
        $user->google2fa_secret = $secret;
        $user->save();

        // Generate a QR code URL
        $qrCodeUrl = $this->google2fa->getQRCodeInline(
            'troxpiApp', // This should be your app name
            $user->email,
            $secret
        );

        return view('user.2fa.setup', ['qrCodeUrl' => $qrCodeUrl, 'secret' => $secret]);
    }

    // Step 6: Store 2FA Secret
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->google2fa_secret = $request->input('secret');
        $user->save();

        return redirect()->route('2fa.verify');
    }

    // Step 7: Show Verification Page
    public function verify()
    {
        return view('user.2fa.verify');
    }

    // Step 8: Validate the 2FA Token
    public function validateToken(Request $request)
    {
        $user = Auth::user();

        $valid = $this->google2fa->verifyKey($user->google2fa_secret, $request->input('token'));

        if ($valid) {
            return "2FA verified successfully.";
            return redirect()->route('dashboard')->with('success', '2FA verified successfully.');
        } else {
            return redirect()->back()->withErrors(['token' => 'Invalid 2FA code.']);
        }
    }
}
