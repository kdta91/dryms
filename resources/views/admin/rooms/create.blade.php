@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Add Room</h1>

        <form action="/admin/rooms" method="post" class="w-100">
            @csrf

            <div class="form-group row col-md-6">
                <label for="roomtype_id">{{ __('Type') }}</label>

                <select id="roomtype_id" name="roomtype_id" class="form-control @error('roomtype_id') is-invalid @enderror" value="{{ old('roomtype_id') }}" autofocus>
                    <option value="">Select Room</option>
                @foreach ($roomtypes as $roomtype)
                    <option value="{{ $roomtype->id }}">{{ $roomtype->type }}</option>
                @endforeach
                </select>

                @error('roomtype_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="number">{{ __('Number') }}</label>

                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror"
                    name="number" value="{{ old('number') }}" autocomplete="number" autofocus>

                @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="price">{{ __('Price') }}</label>

                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                    name="price" value="{{ old('price') }}" autocomplete="price" autofocus>

                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row col-md-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary m-1">{{ __('Add Room') }}</button>
                <a href="/admin/rooms" class="btn btn-secondary m-1">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
