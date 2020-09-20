@extends('adminlte::page')

@section('title', $title ?? '')

@section('content_header')
    <h1>{{ $title ?? '' }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row justify-content-center">
                    <form role="form" class="col-md-8" method="post" action="{{ route('admin.room-types.update', $type->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Type Name</label>
                                    <input type="text" class="form-control @error('type_name') is-invalid @enderror" name="type_name" value="{{ $type->type_name ?? old('type_name') }}" placeholder="Resort/Hotel/Home Stay">
                                </div>
                                @error('type_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Type overview</label>
                                    <textarea id="summerNote" class="form-control @error('type_overview') is-invalid @enderror" rows="3" name="type_overview" placeholder="Enter ...">{{ $type->type_overview ?? old('type_overview') }}</textarea>
                                </div>
                                @error('type_overview')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#summerNote').summernote({
                height: 150,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });
        })
    </script>
@stop

@section('plugins.Select2', true)
