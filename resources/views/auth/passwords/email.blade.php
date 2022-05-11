@extends('layouts.app')

@section('content')
    <div class="vh-100"
        style="background-image: url('https://images.wallpaperscraft.com/image/single/balloons_background_multi-colored_83498_1920x1080.jpg');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card bg-dark text-white card p-5 text-center mb-md-5 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">

                                    <div class="form-outline form-white mb-3">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Email" required
                                            autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="form-outline form-white">
                                        <button type="submit" class="btn btn-primary btn-lg btn-outline-light px-5">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
