@extends('admin.app')

@section('content')
    <div id="main-content">
        <div class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row ">
                        <div class="col-md-2">
                            <form method="GET" id="header-search" action="{{ Route('admin.category.index') }}">
                                <input type="text" name="search" class="form-control search" placeholder=" Search"
                                    value="{{ request() ? request()->search : '' }}" placeholder="Enter Country Name">
                            </form>
                        </div>
                        <div class="col-md-7">
                            Category
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
                                <th>
                                    <a class="btn btn-success" href="{{ Route('admin.category.create') }}">Add</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr data-expanded="true">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.category.edit', $category) }}">Edit</a>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{ route('admin.category.destroy', $category) }}" method="POST">
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
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    @endsection
