@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Name</strong>
        </div>
        <div class="col-md-4">
            {{ $user->name }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Email</strong>
        </div>
        <div class="col-md-4">
            {{ $user->email }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Username</strong>
        </div>
        <div class="col-md-4">
            {{ $user->username }}
        </div>
    </div>

    <div class="row p-2">
        <div class="col-md-2 text-md-right">
            <strong>Type</strong>
        </div>
        <div class="col-md-4">
            {{ $user->usertype->type }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 offset-md-2">
            <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
            <a href="/admin/users" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
@endsection