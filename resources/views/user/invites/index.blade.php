@extends('layouts.user')
@section('content')
    <link rel="stylesheet" href="{{ url('admin/assets/css/font-awesome-n.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/widget.css') }}">
    <div class="pcoded-content">

        <div class="m-2 card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card card-red">
                            <div class="card-body">
                                <div class="row align-items-center m-b-30">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total Balance</h6>
                                        <h3 class="m-b-0 f-w-700 text-white">$0</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
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
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                        {{-- <div class="alert alert-info background-info alert-dismissible">
                            Invite your friends and Get bonus on subscription.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> --}}
                    </div>
                </div>
                <div class="row ">

                    <div class="col-sm-6">

                        <input type="text" id="url" name="url"
                            value="{{ route('signup') }}?ref={{ Auth::user()->id }}" class="form-control">

                    </div>
                    <div class="col-sm-6">
                        <button class="btn waves-effect waves-light btn-success btn-copy" id="btn-copy"
                            onclick="copyToClipboard()"><i class="icofont icofont-ui-clip-board"></i>Copy
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="pcoded-inner-content">
            <div class="card">
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Subscribed Plan </th>
                                <th>Joined at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invitedUsers as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ App\Models\User::find($user->id)->name }}</td>
                                    <td>{{ $user->is_subscribed == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ now()->format('d-m-Y', $user->created_at) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyToClipboard() {
            // Create a temporary textarea element
            let text = document.getElementById('url').value;
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            textarea.setSelectionRange(0, 99999);
            document.execCommand('copy');
            document.body.removeChild(textarea);
            notifyToast('Text copied to clipboard!', 'inverse');
        }
    </script>
@endsection
