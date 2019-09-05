@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>First Name</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->first_name }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Last Name</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->last_name }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Contact Number</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->contact_number }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Address</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->address }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Room No.</strong>
        </div>
        <div class="col-md-4">
            {{ ($booking->room_number) ? $booking->room_number : 'TBA' }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Date In</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->date_in->format('M d, Y g:i A') }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Date Out</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->date_out->format('M d, Y g:i A') }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Special Request</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->special_request }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Booking Status</strong>
        </div>
        <div class="col-md-4">
            {{ $booking->bookingstatus->status }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 offset-md-2">
            <a href="/admin/bookings/{{ $booking->id }}/edit" class="btn btn-primary">Edit</a>
            <a href="/admin/bookings" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
@endsection