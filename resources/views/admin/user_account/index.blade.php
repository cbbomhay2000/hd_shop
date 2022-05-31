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
                        <div class="col-md-7">
                            User Account
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
                                <th>Email</th>
                                <th>Status</th>
                                <th>
                                    <a class="btn btn-success" href="{{ Route('admin.user-account.create') }}">Add</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr data-expanded="true">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == '1')
                                            Block
                                        @else
                                            Active
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.user-account.edit', $user) }}">Edit</a>
                                            </div>
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
