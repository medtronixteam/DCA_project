@extends('layouts.guest')
@section('content')
    <link rel="stylesheet" href="{{url('guest/code.css')}}" />

    <div class="verification-container">
      <div class="verification-card">
        <h3 class="verification-title">
          Email verification code sent to your email.
        </h3>
        <p class="verification-text">
          If you do not receive the code, click on the button below to resend.
        </p>
        <form action="{{route('verification.send')}}" method="POST" >
        @csrf
        <button type="submit" class="resend-code-btn">Resend Code</button>
        </form>

      </div>
    </div>

@endsection
