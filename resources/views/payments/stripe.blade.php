@extends('layouts.app')

@section('head')
    <script src="https://js.stripe.com/v3/"></script>
    <style type="text/css">
        .StripeElement {
            box-sizing: border-box;
            padding: 6px 12px;
            height: 40px;
            font-family: inherit;
            font-size: 14px;
            line-height: 1.42857;
            border: 1px solid #c9c9c9;
            border-radius: 4px;
            background-color: transparent;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection

@section('content')
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
                    <a href="{{ route('home') }}" class="link">book a room</a>
                </div>
            </div>
        </div>
    </div>
    @include("layouts.message")
    <main id="main">
        <div class="container gen-padding">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <form action="{{ route('stripe-payment') }}" method="post" id="payment-form" >
                        @csrf
                        <div class="form" style="margin-bottom:.75rem;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" placeholder="First Name" type="text" id="first_name" value="{{ old("first_name") ?? '' }}" class="form-control @error('first_name')has-error @enderror" required/>
                                    @error('first_name')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" placeholder="Last Name" type="text" id="last_name" value="{{ old("last_name") ?? '' }}" class="form-control @error('last_name')has-error @enderror" required/>
                                    @error('last_name')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 date" id="dpd1" data-date="Check In" data-date-format="dd-mm-yyyy">
                                    <label for="arrival_date">Arrival Date</label>
                                    <input name="arrival_date" placeholder="Arrival Date" type="text" id="arrival_date" value="{{ old("arrival_date") ?? '' }}" class="form-control @error('arrival_date')has-error @enderror" required/>
                                    @error('arrival_date')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 date" id="dpd2" data-date="Check Out" data-date-format="dd-mm-yyyy">
                                    <label for="departure_date">Departure Date</label>
                                    <input name="departure_date" placeholder="Departure Date" type="text" id="departure_date" value="{{ old("departure_date") ?? '' }}" class="form-control @error('departure_date')has-error @enderror" required/>
                                    @error('departure_date')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email address</label>
                                    <input name="email" placeholder="Email Address" type="email" id="email" value="{{ old("email") ?? '' }}" class="form-control @error('email')has-error @enderror" required/>
                                    @error('email')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Contact Number</label>
                                    <input name="phone" placeholder="Contact Number" type="tel" id="phone" value="{{ old("phone") ?? '' }}" class="form-control @error('phone')has-error @enderror" required/>
                                    @error('phone')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" placeholder="Address" type="text" id="address" class="form-control @error('address')has-error @enderror" required>{{ old("address") ?? '' }}</textarea>
                                @error('address')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="city">City Name</label>
                                    <input name="city" placeholder="City" type="text" id="city" value="{{ old("city") ?? '' }}" class="form-control @error('city')has-error @enderror" required/>
                                    @error('city')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="postalcode">Postal Code</label>
                                    <input name="postalcode" placeholder="Postal Code" type="text" id="postalcode" value="{{ old("postalcode") ?? '' }}" class="form-control @error('postalcode')has-error @enderror" required/>
                                    @error('postalcode')<div class="alert alert-danger" style="padding:0.5rem;">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="card-holder-name">Card Holder Name</label>
                                <input id="card-holder-name" class="form-control" placeholder="Card Holder Name" value="{{ old("name" ?? '') }}" type="text">
                            </div>
                            <div id="card-element"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" id="makePayment" type="submit">Submit Payment</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-lg-6">
                    @isset($rooms)
                        <h3>Following is the details of your booking.</h3>
                        <p>You've to make a payment of 12.5% (i.e. {{ $rooms->totalPrice*0.125 }}) of total ({{ $rooms->totalPrice }}) amount in advance for your booking.</p>
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Rooms</th>
                                <th>Particular</th>
                                <th>Room Code</th>
                                <th>Room Price</th>
                                <th>Rooms</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms->rooms as $room)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $room['room']->category->name }}</td>
                                    <td>{{ $room['room']['name'] }}</td>
                                    <td>{{ $room['room']['price'] }}</td>
                                    <td>{{ $room['quantity'] }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="3"></th>
                                <th>Amount</th>
                                <th>Rooms</th>
                            </tr>
                            <tr>
                                <th colspan="3"></th>
                                <th>{{ $rooms->totalPrice*0.125 }}</th>
                                <th>{{ $rooms->quantity }}</th>
                            </tr>
                            </tbody>
                        </table>
                    @endisset
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        var stripe = Stripe('{{ config('app.stripe_key') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {
            style: style,
            hidePostalCode:true,
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
                document.getElementById('makePayment').disabled = true;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('makePayment').disabled = true;
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
