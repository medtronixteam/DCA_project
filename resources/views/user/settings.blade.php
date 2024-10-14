@extends('layouts.user')
@section('content')
<link rel="stylesheet" href="{{url('guest/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/pages.css')}}">
<div class="pcoded-content">

    <div class="page-header card">

    </div>

    <div class="pcoded-inner-content">
        <div class="card">
            <div class="card-header">
                <h2>
                    Payment and Exchange Settings

                  </h2>
            </div>
            <div class="card-body">
                @livewire('exchange')

            </div>
        </div>


    </div>
</div>
<script type="text/javascript" src="{{ url('admin/assets/js/modal.js') }}"></script>
<script src="{{ url('admin/assets/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ url('admin/assets/js/modalEffects.js') }}"></script>

@endsection

