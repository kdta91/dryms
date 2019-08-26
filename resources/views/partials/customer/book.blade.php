@extends('layouts.customer')

@section('content')
<div class="container pb-5" id="select-room-container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h3>Available Rooms</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- loop rooms -->
            {{$rooms}}
            @foreach ($rooms as $room)
            <div class="row pl-5 pr-5 pt-2 pb-2 justify-content-center room-list">
                <div class="col-md-5 p-3 room-list-image">
                    <img src="/img/room1.jpg" alt="" class="img-responsive img-room" title="{{$room->roomtype->type}}" />
                </div>

                <div class="col-md-5 p-3 room-list-details">
                    <h4>{{$room->roomtype->type}}</h4>

                    <p>
                        {{$room->description}}
                    </p>

                    <div class="pt-3 pb-3">
                        <strong class="room-price">&#x20B1; {{$room->price}} / night</strong>
                        <a href="" data-room-id="{{$room->id}}" data-room-type="{{$room->roomtype->type}}" class="text-uppercase text-right px-4 py-2">Book</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- loop rooms -->
        </div>
    </div>
</div>

@include('partials.customer.booknowmodal')

@endsection