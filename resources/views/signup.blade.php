@extends('layouts.guest')
@section('content')
<section class="login-block">

    <div class="container-fluid" style="background-color: black">
        <div class="row">
            <div class="col-sm-12">
                <form class="md-float-material form-material" action="{{route('signup.store')}}" method="post">
                    <div class="text-center">

                    </div>
                    @csrf
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h1 class="text-center txt-primary" style="font-weight: bold;font-family: 'Poppins', sans-serif ">Trox Pi</h1>
                                </div>
                            </div>

                            <p class="text-muted text-center p-b-5">Sign up with your regular account</p>
                            <div class="form-group form-primary">
                                <input type="text" name="name" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="form-label float-label">Name</label>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group form-primary">
                                <input type="email" name="email" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="form-label float-label">Email</label>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="form-label float-label">Password</label>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                            <div class="row m-t-25 text-start">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="form-label">
                                            <input type="checkbox" value>
                                            <span class="cr"><i
                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-end float-end">

                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <button type="submit"
                                            class="btn btn-primary btn-md waves-effect text-center m-b-20">SIGN UP</button>
                                    </div>
                                </div>
                            </div>
                            <p class="text-inverse text-start">Have already an account?<a
                                    href="/login"> <b>Login Here </b></a></p>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    </div>

</section>


@endsection
