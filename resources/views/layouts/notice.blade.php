@if (Session::has('success'))
    <div class="alert alert-success" id="success">
        {{ Session::get('success') }}
        @php
            Session::forget('success')
        @endphp
    </div>
@endif

@if (Session::has('failed'))
    <div class="alert alert-dark text-warning" id="failed">
        {{ Session::get('failed') }}
        @php
            Session::forget('failed')
        @endphp
    </div>
@endif

@push('scripts')
    <script>
        setTimeout(function(){
            $('#success').addClass('hidden');
        }, 2500);
    </script>
@endpush

@push('scripts')
    <script>
        setTimeout(function(){
            $('#failed').addClass('hidden');
        }, 2500);
    </script>
@endpush

<style>
    .hidden {
        display: none
    }
</style>