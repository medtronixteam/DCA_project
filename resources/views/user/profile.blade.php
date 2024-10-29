@extends('layouts.user')
@section('content')
<link rel="stylesheet" href="{{url('guest/profile.css')}}">

    <div class="pcoded-content">
        <div class="page-header card"></div>
        <div class="pcoded-inner-content">
            <div class="card name-card p-4 mt-5 mb-4">
                <h4 class="card-title">Update Your Name</h4>
                <form action="{{ route('user.update.name') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ auth()->user()->name }}" required />
                    <button class="btn btn-black mt-3" type="submit">Update Name</button>
                </form>
            </div>
           @livewire('two-fa')

            <!-- Password Update Form -->
            <div class="card password-card p-4 mb-4">
                <h4 class="card-title">Change Password</h4>
                <form action="{{ route('user.update.password') }}" method="POST" id="resetForm">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input type="password" name="password" class="form-control mb-2" placeholder="Old Password" required/>
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="password" name="new_password" id="new_password" class="form-control mb-2" placeholder="New Password" required />
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control mb-2" placeholder="Confirm Password" required />
                        </div>
                    </div>

                    <button class="btn btn-black mt-3" type="submit">Change Password</button>
                </form>
            </div>

        </div>
    </div>
    {{-- <script>

        function selectExchange(exchangeName) {
          document.getElementById(
            "toastMessage"
          ).textContent = `You selected: ${exchangeName}`;
          var toastEl = document.getElementById("exchangeToast");
          var toast = new bootstrap.Toast(toastEl);
          toast.show();
        }
      </script> --}}
    <script>
        document.getElementById('resetForm').addEventListener('submit', function(event) {
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmPassword) {
                event.preventDefault();
                alert('Passwords do not match. Please try again.');
            }
        });
    </script>
@endsection
