@extends('layouts.customer')

@section('content')
<div class="container-fluid">
    <div class="row" id="home">

    </div>

    @include('partials.customer.rooms')
    @include('partials.customer.contact')
    @include('partials.customer.booknowmodal')
</div>
@endsection