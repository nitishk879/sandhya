{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 mb-3">
            @isset($roles)
                <ul class="list-group">
                    @foreach($roles as $role)
                        <li class="list-group-item bg-info">{{ $role->title }}</li>
                        <ul class="ml-3 list-group">
                            @foreach($role->users as $user)
                                <li class="list-group-item list-group-flush">{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-md-12 mb-3">
            @isset($users)
                <ul class="list-group">
                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $user->name }}
                            <span>@foreach($user->roles as $role) <span class="badge badge-primary badge-pill">{{ $role->title }}</span> @endforeach</span>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-sm btn-outline-success" href="{{ route('admin.add-role', $user) }}">Add Role</a>
                                <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.remove-role', $user) }}">Remove Role</a>
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('admin.edit-user', $user) }}">Edit</a>
                                <a class="btn btn-sm btn-outline-info" href="{{ route('admin.profile', $user) }}">View</a>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin.delete', $user) }}">Delete</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endisset
        </div>
    </div>
@stop
{{--@section('right-sidebar')@stop--}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
