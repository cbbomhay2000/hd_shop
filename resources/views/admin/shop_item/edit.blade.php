@extends('admin.app')

@section('content')
    <div id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Update Shop Item
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal" id="signupForm" method="POST"
                                        action="{{ Route('admin.shop_item.update', $shop_item) }}" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        @include('layouts.notice')

                                        <div class="form-group">
                                            <label for="username" class="control-label col-lg-3">Title</label>
                                            <div class="col-lg-6">
                                                <input class="form-control" value="{{ $shop_item->title }}" id="title"
                                                    name="title" type="text" @error('title') is-invalid @enderror
                                                    value="{{ old('title') }}" required>
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="des" class="control-label col-lg-3">Des</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " value="{{ $shop_item->des }}" id="des"
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
                                            <label for="des" class="control-label col-lg-3">Price</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " value="{{ $shop_item->price }}" id="price"
                                                    name="price" type="text" @error('price') is-invalid @enderror
                                                    value="{{ old('price') }}" required>
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="des" class="control-label col-lg-3">Quantity</label>
                                            <div class="col-lg-6">
                                                <input class="form-control " value="{{ $shop_item->quantity }}" id="price"
                                                    name="quantity" type="text" @error('quantity') is-invalid @enderror
                                                    value="{{ old('quantity') }}" required>
                                                @error('quantity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product" class="control-label col-lg-3">Product</label>
                                            <div class="col-lg-6">
                                                <select name="shop_id" class="form-control custom-select">
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ $product->id == $shop_item->shop_id ? 'selected' : '' }}>
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_status" class="control-label col-lg-3">Image</label>
                                            <div class="col-lg-6">
                                                <input type="file" name="image" id="image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-6">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <a class="btn btn-default"
                                                    href="{{ Route('admin.shop_item.index') }}">Cancel</a>
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
