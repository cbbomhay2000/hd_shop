@extends('admin.app')

@section('content')
    <div id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Update Category
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal" id="signupForm" method="POST"
                                        action="{{ Route('admin.product.update', $product) }}" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        @include('layouts.notice')

                                        <div class="form-group">
                                            <label for="username" class="control-label col-lg-3">Name</label>
                                            <div class="col-lg-6">
                                                <input class="form-control" value="{{ $product->name }}" id="name"
                                                    name="name" type="text" @error('name') is-invalid @enderror
                                                    value="{{ old('name') }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="des" class="control-label col-lg-3">Des</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " value="{{ $product->des }}" id="des"
                                                    name="des" type="text" @error('des') is-invalid @enderror
                                                    value="{{ old('des') }}" required>
                                                @error('des')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="brand" class="control-label col-lg-3">Brand</label>
                                            <div class="col-lg-6">
                                                <select name="brand_id" class="form-control custom-select">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="control-label col-lg-3">Category</label>
                                            <div class="col-lg-6">
                                                <select name="category_id" class="form-control custom-select">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_status" class="control-label col-lg-3">Status</label>
                                            <div class="col-lg-6">
                                                <select name="product_status_id" class="form-control custom-select">
                                                    @foreach ($product_statuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ $status->id == $product->status_id ? 'selected' : ''}}>
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_status" class="control-label col-lg-3">Image</label>
                                            <div class="col-lg-6">
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-6">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <a class="btn btn-default"
                                                    href="{{ Route('admin.product.index') }}">Cancel</a>
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
