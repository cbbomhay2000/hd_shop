@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success')
        @endphp
    </div>
@endif

@if (Session::has('failed'))
    <div class="alert alert-danger">
        {{ Session::get('failed') }}
        @php
            Session::forget('failed')
        @endphp
    </div>
@endif
