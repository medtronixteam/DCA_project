@extends('layouts.user')
@section('content')
<link rel="stylesheet" href="{{url('guest/settings.css')}}">
<div class="pcoded-content">

    <div class="page-header card">
        <h2>
          Payment and Exchange Settings
        </h2>
    </div>

    <div class="pcoded-inner-content">
        <div class="row">
            <!-- Exchange buttons -->
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100" >
                    <img src="{{url('guest/currencies/Binance.svg')}}" />
                </button>
            </div>
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100" >
                    <img src="{{url('guest/currencies/Binance.us.svg')}}" />
                </button>
            </div>
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100" >
                    <img src="{{url('guest/currencies/Coinbase.svg')}}" />
                </button>
            </div>
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100" >
                    <img src="{{url('guest/currencies/Gate.svg')}}" />
                </button>
            </div>
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100" >
                    <img src="{{url('guest/currencies/Huobi.svg')}}" />
                </button>
            </div>
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100" >
                    <img src="{{url('guest/currencies/Kucoin.svg')}}" />
                </button>
            </div>
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100" >
                    <img src="{{url('guest/currencies/Okx.svg')}}" />
                </button>
            </div>
            <div class="col-3 mb-3">
                <button class="btn exchange-btn w-100">
                    <img src="{{url('guest/currencies/Pionex.svg')}}" />
                </button>
            </div>
        </div>

    </div>
</div>

@endsection
