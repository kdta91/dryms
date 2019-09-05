@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Room Details</h1>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Number</strong>
        </div>
        <div class="col-md-4">
            {{ $room->number }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Type</strong>
        </div>
        <div class="col-md-4">
            {{ $room->roomtype->type }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Price</strong>
        </div>
        <div class="col-md-4">
            &#8369; {{ $room->roomtype->price }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Availability</strong>
        </div>
        <div class="col-md-4">
            Display calendar here
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 offset-md-2">
            <a href="/admin/rooms/{{ $room->id }}/edit" class="btn btn-primary">Edit</a>
            <a href="/admin/rooms" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
@endsection