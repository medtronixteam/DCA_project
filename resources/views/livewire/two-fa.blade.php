<div>


    <div wire:loading class="card name-card p-4 mt-5 mb-4 w-100 d-flex- justify-content-center">

        <div class="d-flex justify-content-center">
            @include('loader')
        </div>
    </div>
    @if ($qrCodeUrl)


    <div wire:loading.remove  class="card name-card p-4 mt-5 mb-4 w-100 d-flex- justify-content-center">

        <h4 class="card-title">2FA Authentication</h4>
        <p>Scan this QR code with Google Authenticator:</p>

        {!! $qrCodeUrl !!}
        <p>Or enter this key manually: {{ $secret }}</p>
        <button type="button" wire:click='completeIt' class="btn btn-dark">Complete Setup</button>
    </div>
    @elseif ($qrCodeUrl)

    @else
    @if ($verifyCard)
    <div wire:loading.remove  class="card name-card p-4 mt-5 mb-4 w-100 d-flex- justify-content-center">

        <h4 class="card-title">2FA Authentication</h4>
        <p>Please enter the <b>OTP</b> generated on your Authenticator app </p>
        <p>Ensure you submit the current one because it refreshes every 30 seconds </p>
        @if(session('message'))
        <div class="alert alert-dark w-50">
           {{session('message')}}
        </div>
        @endif
       <div class="row">
        <div class="col-sm-5">
            <input type="text" wire:model='otp_code' class="form-control mb-2">
            <button type="button" wire:click='verify' class="btn btn-dark float-right">Verify</button>
        </div>
       </div>
    </div>
    @else


    <div wire:loading.remove class="card name-card p-4 mt-5 mb-4">
        <div class="d-flex justify-content-between">
            <h4 class="card-title">2FA Authentication</h4>

            @if ($google2fa_secret)
                <button class="btn btn-dark" wire:click='disableIt' type="button">Disable 2FA</button>
            @else
                <button class="btn btn-dark" wire:click='enableIt' type="button">Enable 2FA</button>
            @endif

        </div>
        @if(session('message'))
        <div class="alert alert-dark w-50">
           {{session('message')}}
        </div>
        @endif
        @if ($google2fa_secret)
            <h5>Two Factor Authentication has been enabled</h5>
        @else
            <h5>Two Factor Authentication has been disabled</h5>
        @endif
    </div>
    @endif
    @endif
    {{-- end of card --}}
</div>
