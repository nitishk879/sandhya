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
                    <form role="form" class="col-md-8" method="post" action="{{ route('admin.rooms.update', $room->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Room Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $room->name ?? old('name') }}" placeholder="Map Room">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Room Base Price</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $room->price ?? old('price') }}" placeholder="2400">
                                </div>
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="selectSelected">Hotel</label>
                                    <select id="selectSelected" name="hotel" class="form-control @error('hotel') is-invalid @enderror select2">
                                        <option value="" selected="selected">--Choose--</option>
                                        @foreach($hotels as $hotel)
                                            <option @if($room->hotel_id==$hotel->id OR old('hotel')==$hotel->id) selected @endif value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="selectSelected">Category</label>
                                    <select id="selectSelected" name="category" class="form-control @error('category') is-invalid @enderror select2">
                                        <option value="" selected="selected">--Choose--</option>
                                        @foreach($categories as $category)
                                            <option @if($room->category_id==$category->id OR old('category')==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="selectSelected">Based On</label>
                                    <select id="selectSelected" name="type" class="form-control @error('type') is-invalid @enderror select2">
                                        <option value="" selected="selected">--Choose--</option>
                                        @foreach($types as $type)
                                            <option @if($room->type_id==$type->id OR old('type')==$type->id) selected @endif value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Room Overview</label>
                                    <textarea id="summerNote" class="form-control @error('overview') is-invalid @enderror" rows="3" name="overview" placeholder="Enter ...">{{ $room->overview ?? old('overview') }}</textarea>
                                </div>
                                @error('overview')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ $room->image ?? old('image') }}" id="customFile">
                                    <label class="custom-file-label" for="customFile">{{ $room->image ?? old('image') ?? 'Upload package Image' }}</label>
                                </div>
                                @error('image')
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
