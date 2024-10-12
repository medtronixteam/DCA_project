@extends('layouts.user')
@section('content')
    <div class="pcoded-content">

        <div class="page-header card">
        </div>

        <div class="pcoded-inner-content">
            <div class="row">
                <div class="col-12 col-lg-8 col-md-6">
                    <div class="card"style="background-color: #263544; color: #ffffff;">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bolder">Create New DCA Bot</h2>
                            <div class="card custom-card mt-4 rounded-3"
                                style="background-color: #263544; color: #ffffff; border: 1px solid #737988;"style="background-color: #263544; color: #ffffff;">
                                <div class="card-body">
                                    <h5 class="card-title">Main settings</h5>
                                    <hr>
                                    <form>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text"
                                                class="form-control bg-dark border-0 rounded-3 text-white" style="padding: 11px"
                                                id="name" placeholder="Name">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="exchange" class="form-label">Exchange</label>
                                                <select id="exchange"
                                                    class="form-select  bg-dark border-0 rounded-2 text-white" style="padding: 11px">
                                                    <option selected>Select...</option>
                                                    <option value="1">Exchange 1</option>
                                                    <option value="2">Exchange 2</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="bot-type" class="form-label">Bot type</label>
                                                <select id="bot-type"
                                                    class="form-select  bg-dark border-0 rounded-2 text-white" style="padding: 11px">
                                                    <option selected>Select...</option>
                                                    <option value="1">Type 1</option>
                                                    <option value="2">Type 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card custom-card mt-2 rounded-3"
                                style="background-color: #263544; color: #ffffff; border: 1px solid #737988;"style="background-color: #263544; color: #ffffff;">
                                <div class="card-body">
                                    <h5 class="card-title">Currency Pairs</h5>
                                    <hr>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="exchange" class="form-label">Currency Pairs</label>
                                                <select id="exchange"
                                                    class="form-select  bg-dark border-0 rounded-2 text-white" style="padding: 11px">
                                                    <option selected>Select...</option>
                                                    <option value="1">Exchange 1</option>
                                                    <option value="2">Exchange 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card custom-card mt-2 rounded-3"
                                style="background-color: #263544; color: #ffffff; border: 1px solid #737988;"style="background-color: #263544; color: #ffffff;">
                                <div class="card-body">
                                    <h5 class="card-title">Price Settings</h5>
                                    <hr>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="exchange" class="form-label">Currency Pairs</label>
                                                <select id="exchange"
                                                    class="form-select  bg-dark border-0 rounded-2 text-white" style="padding: 11px">
                                                    <option selected>Select...</option>
                                                    <option value="1">Exchange 1</option>
                                                    <option value="2">Exchange 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card p-3" style="background-color: #263544; color: #ffffff;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Balance</h5>
                                <p class="card-text text-white mb-0">0</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Max amount for bot usage</h5>
                                <p class="card-text text-white mb-0">NaN USDT</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Max safety order price deviation</h5>
                                <p class="card-text text-white mb-0">NaN%</p>
                            </div>
                            <button class="btn btn-danger w-100 py-2 rounded-pill">Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
