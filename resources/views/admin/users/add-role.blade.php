@extends('adminlte::page')

@section('title', 'Edit - ' . $user->name)

@section('content_header')
    <h1>Update - {{ $user->name }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <form class="col-md-8" method="post" action="{{ route('admin.assign-role', $user->id)  }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @foreach($roles as $role)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" id="role{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="custom-control-input">
                                <label class="custom-control-label" for="role{{ $role->id }}">{{ $role->title }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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