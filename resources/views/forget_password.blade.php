@extends('layouts.guest')
@section('content')
    <section class="login-block">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <form class="md-float-material form-material">
                        <div class="text-center">
                            {{-- <img src="../files/assets/images/logo.png" alt="logo.png"> --}}
                            <h1 class="text-center text-white" style="font-weight: bold;font-family: 'Poppins', sans-serif ">
                                Trox Pi</h1>

                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-start">Recover your password</h3>
                                    </div>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{ route('password.send') }}" method="post">
                                    @csrf
                                    <div class="form-group form-primary">
                                        <input type="email" name="email" class="form-control" required>
                                        <span class="form-bar"></span>
                                        <label class="form-label float-label">Your Email Address</label>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-grid">
                                                <button type="submit"
                                                    class="btn btn-primary btn-md waves-effect text-center m-b-20">Reset
                                                    Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <p class="f-w-600 text-end">Back to <a href="/login">Login.</a></p>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-start m-b-0">Thank you.</p>
                                        <p class="text-inverse text-start"><a href="/"><b>Back to
                                                    website</b></a></p>
                                    </div>
                                    <div class="col-md-2">
                                        {{-- <img src="admin/assets/images/auth/Logo-small-bottom.png"
                                        alt="small-logo.png"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>












                </div>

            </div>

        </div>

    </section>
@endsection
