@extends('admin.app')

@section('content')
    <div id="main-content">
        <div class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row ">
                        <div class="col-md-2">
                            <form method="GET" id="header-search" action="{{ Route('admin.shop_item.index') }}">
                                <input type="text" name="search" class="form-control search" placeholder=" Search"
                                    value="{{ request() ? request()->search : '' }}" placeholder="Enter Country Name">
                            </form>
                        </div>
                        <div class="col-md-7">
                            Shop Item
                        </div>
                    </div>
                </div>
                @include('layouts.notice')
                <div>
                    <table class="table" ui-jq="footable">
                        <thead>
                            <tr>
                                <th data-breakpoints="xs">ID</th>
                                <th>title</th>
                                <th>des</th>
                                <th>price</th>
                                <th>image</th>
                                <th>quantity</th>
                                <th>sell_count</th>
                                <th>Product</th>
                                <th>
                                    <a class="btn btn-success" href="{{ Route('admin.shop_item.create') }}">Add</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shop_items as $shop_item)
                                <tr data-expanded="true"> 
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $shop_item->title }}</td>
                                    <td>{{ $shop_item->des }}</td>
                                    <td>{{ $shop_item->price }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $shop_item->image) }}" alt="" width="50px" height="50px">
                                    </td>
                                    <td>{{ $shop_item->quantity }}</td>
                                    <td>{{ $shop_item->sell_count }}</td>
                                    <td>{{ $shop_item->product->name }}</td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.shop_item.edit', $shop_item) }}">Edit</a>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{ route('admin.shop_item.destroy', $shop_item) }}" method="POST">
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
                    {{ $shop_items->links() }}
                </div>
            </div>
        </div>
    @endsection
