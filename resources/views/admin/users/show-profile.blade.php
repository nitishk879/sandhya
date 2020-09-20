@extends('adminlte::page')

@section('title', 'Profile - ' . $user->name)

@section('content_header')
    <h1>Profile - {{ $user->name }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ $user->user_profile->user_avatar ?? '' }}" class="card-img-top" alt="{{ $user->name }}">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Name</strong>: {{ $user->name }}</h5>
                        <p class="card-text">{{ $user->user_profile->user_bio ?? '' }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>First Name</strong>: {{ $user->user_profile->first_name ?? '' }}</li>
                        <li class="list-group-item"><strong>Last Name</strong>: {{ $user->user_profile->last_name ?? '' }}</li>
                        <li class="list-group-item"><strong>Phone</strong>: {{ $user->user_profile->contact_number ?? '' }}</li>

                        <li class="list-group-item"><strong>Email Address</strong>: {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Joined On</strong>: {{ $user->created_at }}</li>
                        <li class="list-group-item"><strong>Roles</strong>: @foreach($user->roles as $role){{ $role->title }}@endforeach</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ $user->email }}" class="card-link">{{ $user->email }}</a>
                        {{--<a href="{{ route('admin.edit-user', $user->id) }}" class="card-link">Edit</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
