@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Add Booking</h1>

        <form action="/admin/bookings" method="post" class="w-100">
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
                <label for="email">{{ __('Email') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                @error('email')
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
                <label for="adult">{{ __('Adults') }}</label>

                <select id="adult" name="adult" class="form-control @error('adult') is-invalid @enderror" value="{{ old('room_id') }}" autofocus>
                    <option value="1">1 Adult</option>
                    <option value="2">2 Adults</option>
                    <option value="3">3 Adults</option>
                    <option value="4">4 Adults</option>
                    <option value="5">5 Adults</option>
                </select>

                @error('adult')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="children">{{ __('Children') }}</label>

                <select id="children" name="children" class="form-control @error('children') is-invalid @enderror" value="{{ old('room_id') }}" autofocus>
                    <option value="0">0 Children</option>
                    <option value="1">1 Children</option>
                    <option value="2">2 Children</option>
                    <option value="3">3 Children</option>
                    <option value="4">4 Children</option>
                    <option value="5">5 Children</option>
                </select>

                @error('children')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="room_id">{{ __('Room Number') }}</label>

                <select id="room_id" name="room_id" class="form-control @error('room_id') is-invalid @enderror" value="{{ old('room_id') }}" autofocus>
                    <option value="">Select Room</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->number }}</option>
                @endforeach
                </select>

                @error('room_id')
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
                <label for="remarks">{{ __('Remarks') }}</label>

                <textarea name="remarks" class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                    cols="30" rows="2" autofocus>{{ old('remarks') }}</textarea>

                @error('remarks')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary m-1">{{ __('Add Booking') }}</button>
                <a href="/admin/bookings" class="btn btn-secondary m-1">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
