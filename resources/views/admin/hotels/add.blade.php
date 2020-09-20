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
                    <form role="form" class="col-md-8" method="post" action="{{ route('admin.hotels.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Sandhya Resort and Spa, Manali">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Hotel Base Price</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="5400">
                                </div>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Hotel Rooms</label>
                                    <input type="number" class="form-control @error('rooms') is-invalid @enderror" name="rooms" value="{{ old('rooms') }}" placeholder="12">
                                </div>
                                @error('rooms')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Hotel Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Kanyal Road, Rangri, Manali, Himachal Pradesh - 175131">
                                </div>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="sandhyapalace@gmail.com">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div class="form-group">
                                    <label>Hotel Contact</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="919418281903">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div class="form-group">
                                    <label>Hotel Mobile</label>
                                    <input type="text" class="form-control @error('phone_alt') is-invalid @enderror" name="phone_alt" value="{{ old('phone_alt') }}" placeholder="919218525695">
                                </div>
                                @error('phone_alt')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Hotel Overview</label>
                                    <textarea id="summerNote" class="form-control @error('overview') is-invalid @enderror" rows="3" name="overview" placeholder="Enter ...">{{ old('overview') }}</textarea>
                                </div>
                                @error('overview')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Hotel Description</label>
                                    <textarea id="summerNote2" class="form-control @error('description') is-invalid @enderror" rows="3" name="description" placeholder="Enter ...">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="customFile">
                                    <label class="custom-file-label" for="customFile">{{ old('image') ?? 'Upload package Image' }}</label>
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
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
            $('#summerNote').summernote({
                height: 150,
                codemirror: {
                    theme: 'monokai'
                }
            });
            $('#summerNote2').summernote({
                height: 450,
                codemirror: {
                    theme: 'monokai'
                }
            });
        });
    </script>
@stop

@section('plugins.Select2', true)
