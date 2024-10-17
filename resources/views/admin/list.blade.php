@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{ url('admin/assets/css/font-awesome-n.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/widget.css') }}">

    <div class="pcoded-content">

        <div class="row p-lg-5 p-2">
            <div class="col-12 col-lg-12 col-md-12 py-2 p-2 ms-lg-2">
                <div class="card shadow-sm">
                    <div class="card-header bg-black text-white">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td> <div class="dropdown">
                                                <button class="btn p-0 border-0 bg-transparent " type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h" style="font-size: 1.5rem;"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a href="javascript:void(0)" class="dropdown-item"
                                                            onclick="confirmDelete({{$user->id}})">Delete</a>
                                                    </li>
                                                    @if ($user->status == 1)
                                                        <li>
                                                            <a href="javascript:void(0)" class="dropdown-item"
                                                                onclick="confirmDisable({{$user->id}})">Disable</a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="javascript:void(0)" class="dropdown-item"
                                                                onclick="confirmEnable({{ $user->id }})">Enable</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div></td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this user permanently?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/users/delete/' + userId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    }
                });
            }
        })
    }
          function confirmDisable(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to disable this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, disable it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/users/disable/' + userId,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Disabled!',
                                'User has been disabled.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        }

        function confirmEnable(userId) {
            Swal.fire({
                title: 'This user is disabled.',
                text: "Do you want to enable this user?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, enable it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/users/enable/' + userId,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Enabled!',
                                'User has been enabled.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        }
    </script>
@endsection
