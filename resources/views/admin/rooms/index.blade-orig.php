@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 p-0">
            <h1>Rooms</h1>
        </div>
        <div class="col-md-4 offset-md-4 text-right p-0">
            <a href="/admin/rooms/create" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add room"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->roomtype->type }}</td>
                    <td>&#8369; {{ $room->price }}</td>
                    <td>
                        <a href="/admin/rooms/{{ $room->id }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i
                                class="fas fa-search"></i></a>
                        <a href="/admin/rooms/{{ $room->id }}/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                class="fas fa-edit"></i></a>
                        <span data-toggle="tooltip" data-placement="top" title="Delete">
                            <a href="#" class="btn btn-danger btn-sm open-delete-modal" data-toggle="modal" data-target="#delete-room-modal" data-id="{{ $room->id }}" data-action="rooms"><i class="fas fa-trash"></i></a>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            {{ $rooms->links() }}
        </div>
    </div>
</div>

@if (count($rooms) > 0)
<div class="modal fade" id="delete-room-modal" tabindex="-1" role="dialog" aria-labelledby="delete-room-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-room-label">Delete Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this room?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-delete" data-id="" data-action="">Confirm</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection