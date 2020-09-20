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
                    <h3 class="card-title">{{ $room->name }} Detail</h3>
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
                                            <span class="info-box-text text-center text-muted">Price</span>
                                            <span class="info-box-number text-center text-muted mb-0"><i class="fas fa-rupee-sign"></i> <del>{{ $room->b2b ?? '' }}</del> {{ $room->price ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Hotel</span>
                                            <span class="info-box-number text-center text-muted mb-0"><i class="fas fa-hotel"></i> {{ $room->hotel->name ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Category</span>
                                            <span class="info-box-number text-center text-muted mb-0"><i class="far fa-star-o"></i> {{ $room->category->name ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mt-5 text-muted">Highlights</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Hotel Name <a href="{{ $room->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $room->name }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Hotel Name <a href="{{ $room->slug }}" class="badge badge-info badge-pill"><i class="fas fa-hotel"></i>{{ $room->hotel->name }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Room Category<a href="{{ $room->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $room->category->name }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Room Sharing Type <a href="{{ $room->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $room->type->name }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Added By<a href="{{ $room->slug }}" class="badge badge-info badge-pill"><i class="fas fa-time"></i>{{ $room->user->name }}</a></li>
                                        <li class="list-group-item d-flex justify-content-between list-group-item-info align-items-center">Hotel Overview</li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="{{ $room->slug }}" class="text-muted"><i class="fas fa-time"></i>{!! $room->overview !!}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-room"></i> {{ $room->name }}</h3>
                            <p class="text-muted">{!! $room->overview !!}</p>
                            <br>
                            <div class="text-muted">
                                <img src="{{ asset("storage/rooms/{$room->image}") }}" class="img-fluid" alt="{{ $room->title }}" />
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
