@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Booking</h1>

        <form action="/admin/bookings/{{ $booking->id }}" method="post" class="w-100">
            @csrf
            @method('PATCH')

            <div class="form-group row col-md-6">
                <label for="first_name">{{ __('First Name') }}</label>

                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                    name="first_name" value="{{ old('first_name') ?? $booking->first_name }}"
                    autocomplete="first_name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="last_name">{{ __('Last Name') }}</label>

                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                    name="last_name" value="{{ old('last_name') ?? $booking->last_name }}" autocomplete="last_name"
                    autofocus>

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
                    value="{{ old('contact_number') ?? $booking->contact_number }}" autocomplete="contact_number"
                    autofocus>

                @error('contact_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="address">{{ __('Address') }}</label>

                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') ?? $booking->address }}" autocomplete="address"
                    autofocus>

                @error('address')
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
                    <option value="{{ $room->id }}" {{ ($room->id === $booking->room['id']) ? 'selected' : '' }}>No. {{ $room->number . ' - ' . $room->roomtype->type }}</option>
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

                <input id="booking_date" name="booking_date" type="text" class="form-control @error('booking_date') is-invalid @enderror" value="{{ old('booking_date') ?? $booking->date_in->toFormattedDateString() . ' - ' . $booking->date_out->toFormattedDateString() }}">

                @error('booking_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- <div class="form-group row col-md-6">
                <label for="date_in">{{ __('Date In') }}</label>

                <datetime id="date_in" input-class="form-control @error('date_in') is-invalid @enderror" name="date_in"
                    value="{{ old('date_in') ?? $booking->date_in->toDateString() }}" autocomplete="date_in"
                    autofocus auto format="DD"></datetime>

                @error('date_in')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="date_out">{{ __('Date Out') }}</label>

                <datetime id="date_out" input-class="form-control @error('date_out') is-invalid @enderror"
                    name="date_out" value="{{ old('date_out') ?? $booking->date_out->toDateString() }}"
                    autocomplete="date_out" autofocus auto format="DD"></datetime>

                @error('date_out')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> -->

            <div class="form-group row col-md-6">
                <label for="special_request">{{ __('Special Request') }}</label>

                <!-- <input id="remark s" type="text" class="form-control @error('special_request') is-invalid @enderror" name="special_request" value="{{ old('special_request') ?? $booking->special_request }}" autocomplete="special_request" autofocus> -->
                <textarea name="special_request" class="form-control @error('special_request') is-invalid @enderror" id="special_request"
                    cols="30" rows="2" autofocus>{{ old('special_request') ?? $booking->special_request }}</textarea>

                @error('special_request')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary m-1">{{ __('Update') }}</button>
                <a href="/admin/bookings" class="btn btn-secondary m-1">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
