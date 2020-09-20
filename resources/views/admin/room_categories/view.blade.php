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
                    <h3 class="card-title">{{ $category->category_name }} Detail</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-room"></i> {{ $category->category_name }} star Property</h3>
                            <p class="text-muted">{!! $category->category_overview !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop