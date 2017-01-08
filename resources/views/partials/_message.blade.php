@if(session('success'))

    <div class="alert alert-success" role="alert">

        {{ Session::get('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger" role="alert">

        {{ Session::get('error') }}
    </div>
@endif