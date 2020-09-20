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
                    @can('create', App\Hotel::class)
                        <a class="btn btn-sm btn-outline-info float-right" href="{{ route('admin.hotels.create') }}"> Add New</a>
                    @endcan
                </div>
                @if($hotels->count()!==0)
                    <div class="card-body">
                        <table id="hotelTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Rooms</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Phone Alt</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels as $hotel)
                                <tr>
                                    <td><img src="{{ asset("storage/hotels/{$hotel->image}") }}" height="60px" width="92px" alt="{{ $hotel->name }}" class="img-thumbnail align-self-center" /> </td>
                                    <td class="font-weight-bold">{{ $hotel->name }}</td>
                                    <td>{{ $hotel->price }}</td>
                                    <td>{{ $hotel->rooms }}</td>
                                    <td>{{ $hotel->email }}</td>
                                    <td>{{ $hotel->phone }}</td>
                                    <td>{{ $hotel->phone_alt }}</td>
                                    <td class="btn btn-group">
                                        @if (Auth::user()->can('view', $hotel))
                                            <a class="btn btn-sm btn-outline-info" href="{{ route('admin.hotels.show', $hotel->id) }}"><i class="fa fa-eye"></i> </a>
                                        @else
                                            <i class="fa fa-file"></i>
                                        @endif
                                        @if (Auth::user()->can('update', $hotel))
                                            <a class="btn btn-sm btn-outline-success" href="{{ route('admin.hotels.edit', $hotel->id) }}"><i class="fa fa-pencil-alt"></i> </a>
                                        @endif
                                        @if (Auth::user()->can('delete', $hotel))
                                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.hotels.destroy', $hotel->id) }}"><i class="fa fa-trash"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="card-body">
                        <p>Sorry! No Hotel found. Please add one as link given above!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#hotelTable').DataTable({
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
