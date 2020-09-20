@extends('layouts.app')

@section('content')
    <div class="banner inner-page-banner">
        <img src="{{ asset("theme/images/inner-page-banner.png") }}" alt="">
    </div>
    <div class="navigation-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-7">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">{{ $page_title ?? 'SANDHYA RESORT & SPA, MANALI' }}</li>
                    </ol>
                </div>
                <div class="col-xs-5">
                    <a href="{{ route('hotels') }}" class="link">book a room</a>
                </div>
            </div>
        </div>
    </div>
    @include("layouts.message")
    <main id="mainInner">
        <div class="container gen-padding">
            <div class="row">
                @isset($rooms)
                    <table class="table table-dark">
                        <thead>
                        <th>Sr.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>No. of Rooms</th>
                        <th>Add</th>
                        <th>Remove</th>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset("storage/rooms/{$room['room']['image']}") }}" alt="" width="32px"> </td>
                                <td>{{ $room['room']->category->name }}</td>
                                {{--<td>{{ $room['room']['name'] }}</td>--}}
                                <td>{{ $room['price'] }}</td>
                                <td>{{ $room['quantity'] }}</td>
                                <td><a href="{{ route("book-room", $room['room']['id']) }}">+</a> </td>
                                <td><a href="{{ route("remove-room", $room['room']['id']) }}"><i class="icon-cancel"></i> </a> </td>
                            </tr>
                        @endforeach
                        <tr style="border-top: 2px solid #234;">
                            <th colspan="5"></th>
                            <th>Total Price</th>
                            <th>Total Rooms</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td><b>{{ $totalPrice }}</b></td>
                            <td><b>{{ $totalQuantity }}</b></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td><a href="{{ route("clear-booking") }}" class="btn btn-default">Clear</a> </td>
                            <td><a href="{{ route("stripe-payment") }}" class="btn btn-default">Checkout</a> </td>
                        </tr>
                        </tbody>
                    </table>
                @else
                    <p>Sorry! You dont' have any room added for your visit. Please add at least one.</p>
                @endif
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#addRoom").on('click', function (e) {
            e.preventDefault();
            var key =   $(this).data('id');
            $.ajax({
                url: '/book-room/'+key,
                type: 'GET',
                data:$(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function () {
                    $('.table').load(' .table');
                    $('.navbar-right').load(' .navbar-right');
                }
            });
        })
        $("#removeRoom").on('click', function (e) {
            e.preventDefault();
            var key =   $(this).data('id');
            $.ajax({
                url: '/remove-room/'+key,
                type: 'GET',
                data:$(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function () {
                    $('.table').load(' .table');
                    $('.navbar-right').load(' .navbar-right');
                }
            });
        })
    </script>
@endsection
