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
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <a class="btn btn-sm btn-outline-info float-right" href="{{ route('admin.room-categories.create') }}"> Add New</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="typeTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            {{--<th>Tours</th>--}}
                            <th colspan="4">Description</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="font-weight-bold">{{ $category->name }}</td>
                                {{--<td>{{ $category->rooms->count() }}</td>--}}
                                <td colspan="4">{!! \Illuminate\Support\Str::words($category->overview, 20, '....') !!}</td>
                                <td class="btn btn-group">
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('admin.room-categories.show', $category->id) }}"><i class="fa fa-eye"></i> </a>
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.room-categories.edit', $category->id) }}"><i class="fa fa-pencil-alt"></i> </a>
                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.room-categories.destroy', $category->id) }}"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#typeTable').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@stop

@section('plugins.Datatables', true)