@extends('layouts.app')

@section('content')
    <div class="vh-100" style="background-image: url('https://images.wallpaperscraft.com/image/single/balloons_background_multi-colored_83498_1920x1080.jpg');">
        <div class="container align-items-center">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="bg-dark text-white card p-5 text-center mb-md-5 mt-md-4 pb-5">
                        <h2 class="text-uppercase text-center mb-4">Create an account</h2>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-4">
                                    <div class="form-outline form-white mb-4">
                                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-outline form-white mb-4">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-outline form-white mb-4">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                            placeholder="New password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <div class="form-outline form-white mb-4">
                                        <input id="password-confirm" type="password" class="form-control form-control-lg"
                                            name="password_confirmation" placeholder="Password confirm" required autocomplete="new-password">
                                    </div>
                                </div>
                                <hr class="my-4">

                                <button type="submit" class="btn btn-primary btn-lg btn-outline-light px-5">
                                    Register
                                </button>
                                <p class="text-center text-muted mt-4 mb-0">Have already an account? <a href="{{ route('login') }}"
                                    class="fw-bold text-primary text-decoration-none">Login here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
 
