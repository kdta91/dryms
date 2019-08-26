@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Purchase Details</h1>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Room Number</strong>
        </div>
        <div class="col-md-4">
            {{ $purchase->booking->room_number }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Origin</strong>
        </div>
        <div class="col-md-4">
            {{ $purchase->origin }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Description</strong>
        </div>
        <div class="col-md-4">
            {{ $purchase->description }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Price</strong>
        </div>
        <div class="col-md-4">
            &#8369; {{ $purchase->price }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Date</strong>
        </div>
        <div class="col-md-4">
            {{ $purchase->date }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 offset-md-2">
            <a href="/admin/purchases/{{ $purchase->id }}/edit" class="btn btn-primary">Edit</a>
            <a href="/admin/purchases" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
@endsection