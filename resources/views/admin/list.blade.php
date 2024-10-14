@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('admin/assets/css/font-awesome-n.min.css') }}">
<link rel="stylesheet" href="{{ url('admin/assets/css/widget.css') }}">

<div class="pcoded-content">

   <div class="row p-lg-5 p-2">
    <div class="col-12 col-lg-12 col-md-12 py-5 p-2 ms-lg-2">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h1 class="mb-0">User List</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>

</div>
@endsection
