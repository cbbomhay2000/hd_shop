@extends('admin.app')
@section('title', 'Edit Admin')

@section('content')
    <div id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Update Admin Account
                                <span class="tools pull-right">
                                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="fa fa-cog" href="javascript:;"></a>
                                    <a class="fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal " id="signupForm" method="POST"
                                        action="{{ Route('admin.admin-account.update', $admin) }}" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        @include('layouts.notice')
                                        <div class="form-group">
                                            <label for="username" class="control-label col-lg-3">Name</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " id="name" name="name" type="text"
                                                    value="{{ $admin->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="control-label col-lg-3">Email</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " id="email" name="email" type="email"
                                                    value="{{ $admin->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label col-lg-3">Status</label>
                                            <div class="col-lg-6">
                                            <select class="form-control" name="status" id="exampleFormControlSelect1">
                                                <option value="1">active</option>
                                                <option value="2">block</option>
                                                <option value="3">approval</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="password" class="control-label col-lg-3">Password</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " id="password" name="password" type="password"
                                                    required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="confirm_password" class="control-label col-lg-3">Confirm
                                                Password</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " id="confirm_password"
                                                    name="password_confirmation" type="password" required
                                                    autocomplete="new-password">
                                                @error('password')
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
                                                    href="{{ Route('admin.admin-account.index') }}">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </div>
    </div>
@endsection
