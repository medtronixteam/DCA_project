@extends('layouts.user')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
    </div>

    <div class="pcoded-inner-content">

    <h2>Setup 2FA</h2>
    <p>Scan this QR code with Google Authenticator:</p>
    <img src="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl={{ $qrCodeUrl }}" alt="QR Code">
    <p>Or enter this key manually: {{ $secret }}</p>

    {!! $qrCodeUrl !!}
    <form method="POST" action="{{ route('2fa.store') }}">
        @csrf
        <input type="hidden" name="secret" value="{{ $secret }}">
        <button type="submit" class="btn btn-primary">Complete Setup</button>
    </form>
</div>
</div>
@endsection
