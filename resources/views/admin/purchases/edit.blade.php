@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Purchase</h1>

        <form action="/admin/purchases/{{ $purchase->id }}" method="post" class="w-100">
            @csrf
            @method('PATCH')

            <div class="form-group row col-md-6">
                <label for="booking_id">{{ __('Room Number') }}</label>

                <select id="booking_id" name="booking_id" class="form-control @error('booking_id') is-invalid @enderror" autofocus>
                    <option value="">Select Room</option>
                @foreach ($bookings as $booking)
                    <option value="{{ $booking->id }}" {{ ($booking->id === $purchase->booking_id) ? 'selected' : '' }}>{{ $booking->room_number }}</option>
                @endforeach
                </select>

                @error('booking_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="origin">{{ __('Origin') }}</label>

                <input id="origin" type="text" class="form-control @error('origin') is-invalid @enderror"
                    name="origin" value="{{ old('origin') ?? $purchase->origin }}" autocomplete="origin" autofocus>

                @error('origin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="description">{{ __('Description') }}</label>

                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                    name="description" value="{{ old('description') ?? $purchase->description }}" autocomplete="description" autofocus>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="price">{{ __('Price') }}</label>

                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                    name="price" value="{{ old('price') ?? $purchase->price }}" autocomplete="price" autofocus>

                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="date">{{ __('Date') }}</label>

               <datetime input-id="date" input-class="form-control @error('date') is-invalid @enderror"
                    name="date" value="{{ old('date') ?? $purchase->date->toDateString() }}" autocomplete="date" autofocus auto
                    min-datetime="" format="DD"></datetime>

                @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary m-1">{{ __('Update') }}</button>
                <a href="/admin/purchases" class="btn btn-secondary m-1">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
