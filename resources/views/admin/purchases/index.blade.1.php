@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 p-0">
            <h1>Purchases</h1>
        </div>
        <div class="col-md-4 offset-md-4 text-right p-0">
            <a href="/admin/purchases/create" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add purchase"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Room No</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                <tr>
                    <td><a href="/admin/bookings/{{ $purchase->booking->id }}">{{ $purchase->booking->room->number }}</a></td>
                    <td>{{ $purchase->origin }}</td>
                    <td>{{ $purchase->description }}</td>
                    <td>&#8369; {{ $purchase->price }}</td>
                    <td>{{ $purchase->date->format('M d, Y') }}</td>
                    <td>
                        <a href="/admin/purchases/{{ $purchase->id }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i
                                class="fas fa-search"></i></a>
                        <a href="/admin/purchases/{{ $purchase->id }}/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                class="fas fa-edit"></i></a>
                        <span data-toggle="tooltip" data-placement="top" title="Delete">
                            <a href="#" class="btn btn-danger btn-sm open-delete-modal" data-toggle="modal" data-target="#delete-purchase-modal" data-id="{{ $purchase->id }}" data-action="purchases"><i class="fas fa-trash"></i></a>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            {{ $purchases->links() }}
        </div>
    </div>
</div>

@if (count($purchases) > 0)
<div class="modal fade" id="delete-purchase-modal" tabindex="-1" role="dialog" aria-labelledby="delete-purchase-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-purchase-label">Delete Purchase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this purchase?
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