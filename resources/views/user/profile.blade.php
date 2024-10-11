@extends('layouts.user')
@section('content')
<link rel="stylesheet" href="{{url('guest/profile.css')}}">
    <div class="pcoded-content">

        <div class="page-header card">
        </div>

        <div class="pcoded-inner-content">

            <!-- Name Card -->
            <div class="card name-card p-4 mt-5 mb-4">
                <h4 class="card-title">Enter Your Name</h4>
                <input type="text" class="form-control" placeholder="Your Name" />
                <button class="btn btn-black mt-3">Submit</button>
            </div>

            <!-- Password Card -->
            <div class="card password-card p-4 mb-4">
                <h4 class="card-title">Change Password</h4>
                <div class="d-flex justify-content-between">
                    <input type="password" class="form-control me-2" placeholder="Old Password" />
                    <input type="password" class="form-control ms-2" placeholder="New Password" />
                </div>
                <input type="password" class="form-control mt-3" placeholder="Confirm Password" />
                <button class="btn btn-black mt-3">Change Password</button>
            </div>


            <!-- Toast Notification -->
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="exchangeToast" class="toast align-items-center text-white bg-dark border-0" role="alert"
                    aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body" id="toastMessage">Exchange Selected!</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>

        function selectExchange(exchangeName) {
          document.getElementById(
            "toastMessage"
          ).textContent = `You selected: ${exchangeName}`;
          var toastEl = document.getElementById("exchangeToast");
          var toast = new bootstrap.Toast(toastEl);
          toast.show();
        }
      </script>
@endsection
