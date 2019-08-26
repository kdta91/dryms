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
        <table class="table table-striped table-bordered" id="purchasesTable">
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
            </tbody>
        </table>
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

@section('scripts')
<script>
    $(function () {
        $('#purchasesTable').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': '{{ route("purchases.data") }}',
            'columns': [
                { 'data': 'booking_id' },
                { 'data': 'origin' },
                { 'data': 'description' },
                {
                    'data': 'price',
                    'render': function (data, type, full) {
                        return '&#8369;' + full['price'];
                    }
                },
                { 'data': 'date' },
                {
                    'data': 'actions',
                    'render' : function (data, type, full) {
                        return `
                            <a href="/admin/rooms/`+full['id']+`" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i
                                class="fas fa-search"></i></a>
                            <a href="/admin/rooms/`+full['id']+`/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                    class="fas fa-edit"></i></a>
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" class="btn btn-danger btn-sm open-delete-modal" data-toggle="modal" data-target="#delete-room-modal" data-id="`+full['id']+`" data-action="rooms"><i class="fas fa-trash"></i></a>
                            </span>
                        `;
                    },
                    'searchable': false,
                    'sortable': false
                }
            ]
        });
    });
</script>
@endsection