@extends('layouts.customer')

@section('content')
<div class="container pb-5" id="select-room-container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h3>Available Units</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- loop rooms -->
            @foreach ($room_types as $room_type)
            <div class="row pl-4 pr-4 pt-2 pb-2 justify-content-center room-list">
                <div class="col-md-5 p-3 room-list-image">
                    <!-- <img src="/img/room1.jpg" alt="" class="img-responsive img-room" title="{{$room_type->type}}" /> -->

                    <div class="room-images">
                        <!-- <a href="../img/room1.jpg" class="big room-thumb"><img src="../img/room1.jpg" alt="" class="img-responsive img-room" title="Single Room" /></a>
                        <a href="../img/room1.jpg" class="hide"><img src="../img/room1.jpg" alt="" class="img-responsive img-room" title="Single Room" /></a>
                        <a href="../img/room1.jpg" class="hide"><img src="../img/room1.jpg" alt="" class="img-responsive img-room" title="Single Room" /></a>
                        <a href="../img/room1.jpg" class="hide"><img src="../img/room1.jpg" alt="" class="img-responsive img-room" title="Single Room" /></a>
                        <a href="../img/room1.jpg" class="hide"><img src="../img/room1.jpg" alt="" class="img-responsive img-room" title="Single Room" /></a> -->
                        <span class="magnify-icon"><i class="fas fa-search"></i></span>
                    </div>
                </div>

                <div class="col-md-5 p-3 room-list-details">
                    <h4>{{$room_type->type}}</h4>

                    <p>
                        {!! $room_type->description !!}
                    </p>

                    <div class="pt-3 pb-3">
                        <strong class="room-price">&#x20B1; {{$room_type->price}} / night</strong>
                        <a href="" data-room-type-id="{{$room_type->id}}" data-room-type="{{$room_type->type}}" data-room-price="{{$room_type->price}}" class="text-uppercase text-right px-4 py-2 btn-book-room">Book</a>
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