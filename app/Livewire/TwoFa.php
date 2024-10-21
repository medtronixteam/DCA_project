<?php
namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Google2FA;

class TwoFa extends Component
{
    protected $google2fa;
    public $google2fa_secret, $qrCodeUrl, $secret,$otp_code,$Message;
    public $verifyCard=false;


    // Inject Google2FA via the constructor
    public function __construct()
    {
        $this->google2fa = app(Google2FA::class);
    }

    public function render()
    {

        // Check if the user has 2FA enabled
        $this->google2fa_secret = auth()->user()->is_2fa_enabled;

        return view('livewire.two-fa');
    }

    public function disableIt()
    {
        $user = auth()->user();
        $user->is_2fa_enabled = false;
        $user->google2fa_secret = null;
        $user->save();

        $this->google2fa_secret = false;
        flashy()->success('2FA has been disabled');
    }

    public function enableIt()
    {
        $user = Auth::user();

        // Generate a new 2FA secret key
        $secret = $this->google2fa->generateSecretKey();
        $user->google2fa_secret = $secret;
        $user->save();

        // Generate a QR code URL
        $qrCodeUrl = $this->google2fa->getQRCodeInline(
            'troxpiApp', // This should be your app name
            $user->email,
            $secret
        );


        $this->qrCodeUrl = $qrCodeUrl;
        $this->secret = $secret;
    }
    public function verify()  {

        $user = Auth::user();
        $valid = $this->google2fa->verifyKey($user->google2fa_secret, $this->otp_code);

        if ($valid) {
            $user->is_2fa_enabled = true;
            $user->save();
            $this->verifyCard = false;

        } else {

            session()->flash('message','Invalid OTP ...!');
           // return redirect()->back()->withErrors(['token' => 'Invalid 2FA code.']);
        }
    }
    public function completeIt()  {
        $this->qrCodeUrl = false;
        $this->verifyCard = true;
    }

}
