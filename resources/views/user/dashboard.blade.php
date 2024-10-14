@extends('layouts.user')
@section('content')
<link rel="stylesheet" href="{{ url('admin/assets/css/font-awesome-n.min.css') }}">
<link rel="stylesheet" href="{{ url('admin/assets/css/widget.css') }}">
<div class="pcoded-content">

    <div class="page-header card">
    </div>

    <div class="pcoded-inner-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-6">
                        <div class="card prod-p-card card-red">
                            <div class="card-body">
                                <div class="row align-items-center m-b-30">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total Bot</h6>
                                        <h3 class="m-b-0 f-w-700 text-white">0</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card prod-p-card card-blue">
                            <div class="card-body">
                                <div class="row align-items-center m-b-30">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Invited Friends</h6>
                                        <h3 class="m-b-0 f-w-700 text-white">0</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-c-blue f-18"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-info background-info alert-dismissible">
                           Welcome to Trox Pi.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @if (auth()->user()->is_subscribed==0)
                        @php
                            $leftDays=14-$dayLeft;
                        @endphp
                        <div class="alert alert-{{($leftDays<4)?"danger":"warning"}} background-{{($leftDays<4)?"danger":"warning"}} alert-dismissible">
                            You are currently on a trial period, with {{14-$dayLeft}} days remaining.
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                        @endif

                         <div class="alert alert-info background-info alert-dismissible">
                            Invite a friend and get $10 when they subscribe!
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
