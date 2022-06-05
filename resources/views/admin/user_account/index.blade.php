@extends('admin.app')

@section('content')
    <div id="main-content">
        <div class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row ">
                        <div class="col-md-2">
                            <form method="GET" id="header-search" action="{{ Route('admin.user-account.index') }}">
                                <input type="text" name="search" class="form-control search" placeholder=" Search"
                                    value="{{ request() ? request()->search : '' }}" placeholder="Enter Country Name">
                            </form>
                        </div>
                        
                        <div class="col-md-9">
                            User Account
                        </div>
                        <div class="col-md-1">
                            <a class="btn btn-success" href="{{ Route('admin.user-account.create') }}">Add</a>
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr data-expanded="true">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $user->image) }}" alt="" width="50px" height="50px">
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>
                                        @if ($user->status == '1')
                                            Block
                                        @else
                                            Active
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            @if ($user->status === 2)
                                                <div class="col-md-2">
                                                    <a class="btn btn-warning"
                                                        href="{{ route('admin.block_user', $user) }}">Block</a>
                                                </div>
                                            @else
                                                <div class="col-md-2">
                                                    <a class="btn btn-success"
                                                        href="{{ route('admin.block_user', $user) }}">Active</a>
                                                </div>
                                            @endif
                                            <div class="col-md-2">
                                                <a class="btn btn-info"
                                                    href="{{ route('admin.show', $user) }}">Detail</a>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{ route('admin.user-account.destroy', $user) }}"
                                                    method="POST">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    @endsection
