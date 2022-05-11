@extends('layouts.app')
@section('content')
    <div class="vh-100" style="background-image: url('https://images.wallpaperscraft.com/image/single/balloons_background_multi-colored_83498_1920x1080.jpg');">
        <div class="container align-items-center">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="bg-dark text-white card p-5 text-center mb-md-5 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-50 mb-4">Please enter your login and password!</p>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="form-outline form-white mb-3">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-outline form-white">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row mb-3">
                                    <div class="form-check d-flex ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-outline-light px-5">
                                    Login
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Sign Up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
