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
                    <a class="btn btn-sm btn-outline-info float-right" href="{{ route('admin.rooms.create') }}"> Add New</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="roomTable" class="table text-center table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Hotel</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td><img src="{{ asset("storage/rooms/{$room->image}") }}" height="60px" width="92px" alt="{{ $room->name }}" class="img-thumbnail align-self-center" /> </td>
                                <td class="font-weight-bold">{{ $room->name }}</td>
                                <td><i class="fas fa-rupee-sign"></i> {{ $room->price }}</td>
                                <td>{{ $room->hotel->name ?? '' }}</td>
                                <td>{{ $room->category->name }}</td>
                                <td>{{ $room->type->name }}</td>
                                <td class="btn btn-group">
                                    @if (Auth::user()->can('view', $room))
                                        <a class="btn btn-sm btn-outline-info" href="{{ route('admin.rooms.show', $room->id) }}"><i class="fa fa-eye"></i> </a>
                                    @else
                                        <i class="fa fa-file"></i>
                                    @endif
                                    @if (Auth::user()->can('update', $room))
                                        <a class="btn btn-sm btn-outline-success" href="{{ route('admin.rooms.edit', $room->id) }}"><i class="fa fa-pencil-alt"></i> </a>
                                    @endif
                                    @if (Auth::user()->can('delete', $room))
                                        <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.rooms.destroy', $room->id) }}"><i class="fa fa-trash"></i> </a>
                                    @endif
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
            $('#roomTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        })
    </script>
@stop

@section('plugins.Datatables', true)
