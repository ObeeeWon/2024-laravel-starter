@if (Session::has('success'))
    <div class='alert alert-success' role='alert'>{{-- this is set up for bootstrap --}}
        <strong>Success: </strong> {{ Session::get('success') }}
        {{-- '{{' is directive to trigger PHP to echo something --}}
        {{-- flash session, once retrieved it's gone --}}
    </div>
@endif

@if (Session::has('error'))
    <div class='alert alert-danger' role='alert'>
        <strong>Error: </strong> {{ Session::get('error') }}
    </div>
@endif

{{-- show all error if there's more than one --}}
@if (count ($errors) > 0 )
    <div class='alert alert-danger' role='alert'>
        <strong>Errors: </strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif