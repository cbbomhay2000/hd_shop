@extends('admin.app')

@section('content')
    <div id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Add New Brand
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal " id="signupForm" method="POST"
                                        action="{{ Route('admin.brands.store') }}" novalidate="novalidate">
                                        @csrf

                                        @include('layouts.notice')
                                        
                                        <div class="form-group ">
                                            <label for="username" class="control-label col-lg-3">Name</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " id="name" name="name" type="text"
                                                    @error('name') is-invalid @enderror value="{{ old('name') }}"
                                                    required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-6">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <a class="btn btn-default"
                                                    href="{{ Route('admin.brands.index') }}">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
    </div>
@endsection
