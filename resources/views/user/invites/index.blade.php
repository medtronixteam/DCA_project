@extends('layouts.user')
@section('content')
<div class="pcoded-content">

    <div class="m-2 card ">
        <div class="row card-body">
            <div class="col-sm-6">

                <input type="text" id="url" name="url" value="{{route('signup')}}?ref={{Auth::user()->id}}" class="form-control" >

            </div>
            <div class="col-sm-6">
                <button class="btn waves-effect waves-light btn-success btn-copy" id="btn-copy" onclick="copyToClipboard()"><i class="icofont icofont-ui-clip-board"></i>Copy
                    </button>
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
                    <th>Joined at</th>
                </tr>
            </thead>
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
