@extends('layouts.user')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
    </div>

    <div class="pcoded-inner-content">
    <h2>Enter 2FA Code</h2>
    <form method="POST" action="{{ route('2fa.validate') }}">
        @csrf
        <div class="form-group">
            <label for="token">Authenticator Code</label>
            <input type="text" name="token" class="form-control" id="token" required>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
</div>
@endsection
