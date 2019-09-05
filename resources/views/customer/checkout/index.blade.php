@extends('layouts.customer')

@section('content')
<div class="container" id="checkout-container">
    <div class="row justify-content-center">
        <div class="col-md-5 p-4">
            <div style="background-color: #d4edda; color: #006900;" class="p-2"><i
                class="fas fa-exclamation-circle"></i> You're almost there. Book now to secure your stay! Don't miss
            this opportunity before it's too late.</div>

            <div class="pt-4">
                <div class="checkout-heading">
                    <h3>{{$data['room']->roomtype->type}}</h3>

                    <h4>Your Details</h4>
                </div>

                <form action="/search/checkout" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="first_name">{{ __('First Name') }} <span class="required-label">*</span></label>

                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">{{ __('Last Name') }} <span class="required-label">*</span></label>

                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Email') }} <span class="required-label">*</span></label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="contact_number">{{ __('Contact Number') }} <span class="required-label">*</span></label>

                        <input id="contact_number" type="text"
                            class="form-control @error('contact_number') is-invalid @enderror" name="contact_number"
                            value="{{ old('contact_number') }}" autocomplete="contact_number" autofocus>

                        @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">{{ __('Address') }} <span class="required-label">*</span></label>

                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- <div class="form-group row d-none">
                        <label for="booking_date">{{ __('Date In - Date Out') }}</label>

                        <input id="booking_date" name="booking_date" type="text" class="form-control @error('booking_date') is-invalid @enderror" value="{{$data['date_in']->toFormattedDateString() . ' - ' . $data['date_out']->toFormattedDateString()}}">

                        @error('booking_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> -->

                    <div class="form-group">
                        <label for="special_request">{{ __('Special Request') }}</label>

                        <!-- <input id="special_request" type="text" class="form-control @error('special_request') is-invalid @enderror" name="special_request" value="{{ old('special_request') }}" autocomplete="special_request" autofocus> -->
                        <textarea name="special_request" class="form-control @error('special_request') is-invalid @enderror" id="special_request"
                            cols="30" rows="2" autofocus>{{ old('special_request') }}</textarea>

                        @error('special_request')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group justify-content-end">
                        <button type="submit" class="btn text-white btn-cta m-1 text-uppercase font-weight-bold" id="btn-confirm-booking">{{ __('Confirm Booking') }}</button>

                        <!-- <div id="paypal-button-container"></div> -->

                        <script>
                            // paypal.Buttons({
                            //     // createOrder: function(data, actions) {
                            //     //     return fetch('/search/checkout', {
                            //     //         method: 'post',
                            //     //         headers: {
                            //     //             'content-type': 'application/json'
                            //     //         }
                            //     //     }).then(function(res) {
                            //     //         console.log(res);
                            //     //         res.orderID = 1;
                            //     //         // return res.json();
                            //     //         return res;
                            //     //     }).then(function(data) {
                            //     //         console.log(data);
                            //     //         // return data.orderID; // Use the same key name for order ID on the client and server
                            //     //         return data.orderID; // Use the same key name for order ID on the client and server
                            //     //     });
                            //     // }
                            // }).render('#paypal-button-container');

                        </script>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-5 p-4">
            <div class="card" id="checkout-total">
                <div class="card-header text-uppercase">
                    <strong class="float-left">Total</strong>
                    <strong class="float-right">&#x20B1; {{$data['total']}}</strong>
                </div>
                <div class="card-body">
                    <div class="text-uppercase pb-2">
                        <strong>Your Accommodation</strong>
                    </div>

                    <div class="pt-2">
                        <span class="float-left label">Check In</span>
                        <span class="float-right text">{{$data['date_in']->isoFormat('dddd, DD MMMM YYYY')}}</span>

                        <div class="clear-both"></div>

                        <span class="float-left label">Check Out</span>
                        <span class="float-right text">{{$data['date_out']->isoFormat('dddd, DD MMMM YYYY')}}</span>

                        <div class="clear-both"></div>

                        <span class="float-left label">No. of Nights</span>
                        <span class="float-right text">{{$data['nights']}}</span>

                        <div class="clear-both"></div>

                        <span class="float-left label">Room</span>
                        <span class="float-right text">{{$data['room']->roomtype->type}}</span>

                        <div class="clear-both"></div>

                        <span class="float-left label">Guests</span>
                        <span class="float-right text">{{$data['guests']}}</span>
                    </div>
                </div>
                <div class="card-footer text-uppercase">
                    <strong class="float-left">Total Price</strong>
                    <strong class="float-right">&#x20B1; {{$data['total']}}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
