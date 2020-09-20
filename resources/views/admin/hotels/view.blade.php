@extends('adminlte::page')

@section('title', $title ?? '')

@section('content_header')
    <h1>{{ $title ?? '' }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card d-flex w-100">
                <div class="card-header">
                    <h3 class="card-title">{{ $hotel->name }} Detail</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Total Price</span>
                                            <span class="info-box-number text-center text-muted mb-0"><i class="fas fa-rupee-sign"></i> <del>{{ $hotel->b2b ?? '' }}</del> {{ $hotel->price ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Email Address</span>
                                            <span class="info-box-number text-center text-muted mb-0"><i class="fas fa-envelope"></i> {{ $hotel->email ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Phone</span>
                                            <span class="info-box-number text-center text-muted mb-0"><i class="fas fa-phone"></i> {{ $hotel->phone ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mt-5 text-muted">Highlights</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Hotel Name <a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $hotel->name }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Email Address <a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $hotel->email }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Phone Number<a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-phone"></i>{{ $hotel->phone }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Alternate Number<a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-phone"></i>{{ $hotel->phone_alt }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Hotel Address<a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $hotel->address }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Hotel Base Price<a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-rupee-sign"></i>{{ $hotel->price }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Link<a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $hotel->slug }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Hotel Rooms<a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $hotel->rooms }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Added By<a href="{{ $hotel->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $hotel->user->name }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between list-group-item-info align-items-center">Hotel Overview</li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="{{ $hotel->slug }}" class="text-muted"><i class="fas fa-time"></i>{!! $hotel->overview !!}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-hotel"></i> {{ $hotel->name }}</h3>
                            <p class="text-muted">{!! $hotel->overview !!}</p>
                            <br>
                            <div class="text-muted">
                                <img src="{{ asset("storage/hotels/{$hotel->image}") }}" class="img-fluid" alt="{{ $hotel->title }}" />
                            </div>
                            <div class="text-center mt-5 mb-3">
                                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('.select2').select2();
            $('#summerNote').summernote({
                height: 150,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });
        });

    </script>
@stop

@section('plugins.Select2', true)
