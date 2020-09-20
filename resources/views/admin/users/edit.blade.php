@extends('adminlte::page')

@section('title', 'Edit - ' . $user->name)

@section('content_header')
    <h1>Update - {{ $user->name }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <form class="col-md-8" method="post" action="{{ route('admin.save-user-profile', $user) }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="first_name" class="form-control form-control-sm @error('first_name') is-invalid @enderror" value="{{ $user->user_profile->first_name ?? old('first_name') }}" placeholder="First name">
                    </div>
                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6 mb-3">
                        <input type="text" name="last_name" class="form-control form-control-sm @error('last_name') is-invalid @enderror" value="{{ $user->user_profile->last_name ?? old('last_name') }}" placeholder="Last name">
                    </div>
                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6 mb-3">
                        <input type="text" name="contact_number" class="form-control form-control-sm @error('contact_number') is-invalid @enderror" value="{{ $user->user_profile->contact_number ?? old('contact_number') }}" placeholder="Phone Number">
                    </div>
                    @error('contact_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-12 mb-3">
                        <textarea name="user_bio" class="form-control form-control-sm @error('user_bio') is-invalid @enderror" placeholder="write about yourself...">{{ $user->user_profile->user_bio ?? old('user_bio') }}</textarea>
                    </div>
                    @error('user_bio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-12 mb-3">
                        <div class="custom-file @error('user_avatar') is-invalid @enderror">
                            <input type="file" class="custom-file-input" name="user_avatar" id="userAvatar" value="{{ $user->user_profile->user_avatar ?? old('user_avatar') }}">
                            <label class="custom-file-label" for="userAvatar">{{ $user->user_profile->user_avatar ?? old('user_avatar') }}</label>
                        </div>
                        @error('user_avatar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-outline-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop