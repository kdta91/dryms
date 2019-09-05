@extends('layouts.customer')

@section('content')
<div class="container-fluid">
    @include('partials.customer.banner')
    @include('partials.customer.rooms')
    @include('partials.customer.contact')
    @include('partials.customer.booknowmodal')
</div>
@endsection