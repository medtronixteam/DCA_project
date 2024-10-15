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
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card p-4 rounded" style="height:285px; background-color:rgb(14, 13, 13); color:white;">
                        <h5 class="card-title">Free</h5>
                        <h3 class="fw-bold mb-2">$0/month</h3>
                        <p class="">Free of cost</p>
                        <button class="btn custom text-white rounded-2" style="margin-top: 65px; border: 1px solid #737988">Active Plan</button>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card p-4 rounded">
                        <h5 class="card-title">Pro</h5>
                        <h3 class="fw-bold mb-2">${{ $plans[0]->price }}/{{ $plans[0]->duration }}</h3>
                        <p class="text-muted">Save $144 with annual payment</p>
                        <form action="" method="post" id="change-price-form">
                            @csrf
                            <input type="hidden" value="pro" name="name">
                            <input type="hidden" value="month" name="duration">
                            <input name="price" class="p-1 my-3 rounded-2" type="number" placeholder="Change price here" id="pro-price-1" data-plan-id="1" required>
                            <button type="submit" class="btn mb-3 custom change-price-button rounded-2">Change Price</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card p-4 rounded">
                        <h5 class="card-title">Expert</h5>
                        <h3 class="fw-bold mb-2">${{ $plans[1]->price }}/{{ $plans[1]->duration }}</h3>
                        <p class="text-muted">Save $240 with annual payment</p>
                        <form action="" method="post" id="change-price-form2">
                            @csrf
                            <input type="hidden" value="expert" name="name">
                            <input type="hidden" value="month" name="duration">
                            <input name="price" class="p-1 my-3 rounded-2" type="number" placeholder="Change price here" id="expert-price" data-plan-id="2" required>
                            <button type="submit" class="btn mb-3 custom change-price-button rounded-2">Change Price</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function handleFormSubmission(formId) {
            $(formId).submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.plans.change-price') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        notifyToast('Price updated successfully', 'inverse');
                    },
                    error: function (xhr) {
                        notifyToast('An error occurred while updating', 'inverse');
                    }
                });
            });
        }
        handleFormSubmission('#change-price-form');
        handleFormSubmission('#change-price-form2');
    });
</script>

@endsection
