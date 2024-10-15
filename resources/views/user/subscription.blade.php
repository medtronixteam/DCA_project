@extends('layouts.admin')
@section('content')

<style>
    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card h2 {
        color: #333;
    }

    .card button {
        width: 100%;
        padding: 10px;
    }

    .card ul {
        padding-left: 0;
    }

    .card li {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .badge {
        font-size: 0.8rem;
        padding: 0.3rem;
    }

    .custom {
        border: 2px solid black;
    }

    .custom:hover {
        color: white;
        background-color: #737988;
    }
</style>

<link rel="stylesheet" href="{{ url('admin/assets/css/font-awesome-n.min.css') }}">
<link rel="stylesheet" href="{{ url('admin/assets/css/widget.css') }}">

<div class="pcoded-content">
    <div class="page-header card">
        <h1>Plans</h1>
    </div>

    <div class="pcoded-inner-content">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6 col-md-6">
                    <div class="card p-4 rounded" style="height: 503px">
                        <h5 class="card-title">Pro</h5>
                        <h2 class="fw-bold mb-2">${{ $plans[0]->price }}/{{ $plans[0]->duration }}</h2>
                        <p class="text-muted">Save $144 with annual payment</p>
                        <button class="btn mb-3 custom" data-id="1">Choose A Plan</button>
                        <ul style="line-height: 30px">
                            <li class="mb-2">Active SmartTrades</li>
                            <li><strong>50</strong> Running Signal Bots</li>
                            <li><strong>50</strong> Running Grid Bots</li>
                            <li><strong>250</strong> Running DCA Bots <br>
                                <p class="badge bg-light text-info">Multi-pair Available</p>
                            </li>
                            <li><strong>2500</strong> Active DCA Deal</li>
                        </ul>
                    </div>
                </div>


                <div class="col-12 col-lg-6 col-md-6">
                    <div class="card p-4 rounded" style="border: 1px solid #737988;">
                        <h5 class="card-title">Expert</h5>
                        <h2 class="fw-bold mb-2">${{ $plans[1]->price }}/{{ $plans[1]->duration }}</h2>
                        <p class="text-muted">Save $240 with annual payment</p>
                        <button class="btn mb-3 custom" data-id="2">Choose A Plan</button>
                        <ul style="line-height: 30px">
                            <li class="fw-bold mb-2">Unlimited</li>
                            <li class="mb-2">Active SmartTrades</li>
                            <li><strong>50</strong> Running Signal Bots</li>
                            <li><strong>50</strong> Running Grid Bots</li>
                            <li><strong>250</strong> Running DCA Bots <br>
                                <p class="badge bg-light text-info">Multi-pair Available</p>
                            </li>
                            <li><strong>2500</strong> Active DCA Deal</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
