@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            @include('partials.admin.dashboard.bookings')
        </div>

        <div class="col-md-6">
            @include('partials.admin.dashboard.rooms')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @include('partials.admin.dashboard.purchases')
        </div>
    </div>
</div>
@endsection
