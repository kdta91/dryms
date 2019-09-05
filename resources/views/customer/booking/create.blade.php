@extends('layouts.customer')

@section('content')
<div class="container" id="create-booking-container">
    <div class="row">
        <div class="col-md-6">
            <h3>Contact</h3>
        </div>

        <div class="col-md-6">
            <h3>Reserve a room</h3>

            <form action="/book" method="post" class="w-100">
                @csrf

                <div class="form-group row col-md-6">
                    <label for="first_name">{{ __('First Name') }}</label>

                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                        name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row col-md-6">
                    <label for="last_name">{{ __('Last Name') }}</label>

                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row col-md-6">
                    <label for="contact_number">{{ __('Contact Number') }}</label>

                    <input id="contact_number" type="text"
                        class="form-control @error('contact_number') is-invalid @enderror" name="contact_number"
                        value="{{ old('contact_number') }}" autocomplete="contact_number" autofocus>

                    @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row col-md-6">
                    <label for="address">{{ __('Address') }}</label>

                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row col-md-6">
                    <label for="booking_date">{{ __('Date In - Date Out') }}</label>

                    <input id="booking_date" name="booking_date" type="text" class="form-control @error('booking_date') is-invalid @enderror">

                    @error('booking_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- <div class="form-group row col-md-6">
                    <label for="date_in">{{ __('Date In') }}</label>

                    <datetime input-id="date_in" input-class="form-control @error('date_in') is-invalid @enderror"
                        name="date_in" value="{{ old('date_in') }}" autocomplete="date_in" autofocus auto
                        min-datetime="{{ $minDate }}" format="DD"></datetime>

                    @error('date_in')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row col-md-6">
                    <label for="date_out">{{ __('Date Out') }}</label>

                    <datetime input-id="date_out" input-class="form-control @error('date_out') is-invalid @enderror"
                        name="date_out" value="{{ old('date_out') }}" autocomplete="date_out" autofocus auto
                        min-datetime="{{ $minDate }}" format="DD"></datetime>

                    @error('date_out')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> -->

                <div class="form-group row col-md-6">
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

                <div class="form-group row col-md-6 d-flex justify-content-end">
                    <button type="submit" class="btn text-white btn-cta m-1">{{ __('Reserve') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection