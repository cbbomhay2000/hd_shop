@extends('admin.app')

@section('content')
    <div id="main-content">
        <div class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row ">
                        <div class="col-md-2">
                            <form method="GET" id="header-search" action="{{ Route('admin.product.index') }}">
                                <input type="text" name="search" class="form-control search" placeholder=" Search"
                                    value="{{ request() ? request()->search : '' }}" placeholder="Enter Country Name">
                            </form>
                        </div>
                        <div class="col-md-7">
                            Product
                        </div>
                    </div>
                </div>
                @include('layouts.notice')
                <div>
                    <table class="table" ui-jq="footable">
                        <thead>
                            <tr>
                                <th data-breakpoints="xs">ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>
                                    <a class="btn btn-success" href="{{ Route('admin.product.create') }}">Add</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr data-expanded="true"> 
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $product->image) }}" alt="" width="50px" height="50px">
                                    </td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->category->name }}</td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.product.edit', $product) }}">Edit</a>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{ route('admin.product.destroy', $product) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    @endsection
