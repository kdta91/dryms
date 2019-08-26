@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 p-0">
            <h1>Bookings</h1>
        </div>
        <div class="col-md-4 offset-md-4 text-right p-0">
            <a href="/admin/bookings/create" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add booking"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered" id="bookingsTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">First Name</th> <!-- In order to search for first name. Set to hidden. -->
                    <th scope="col">Last Name</th> <!-- In order to search for last name. Set to hidden. -->
                    <th scope="col">Name</th>
                    <th scope="col">Date In</th>
                    <th scope="col">Date Out</th>
                    <th scope="col">Room No.</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@if (count($bookings) > 0)
<div class="modal fade" id="delete-booking-modal" tabindex="-1" role="dialog" aria-labelledby="delete-booking-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-booking-label">Delete Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this booking?
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
        $('#bookingsTable').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': '{{ route("bookings.data") }}',
            'columns': [
                {
                    'data': 'first_name',
                    'visible': false
                },
                {
                    'data': 'last_name',
                    'visible': false
                },
                { 'data': 'name' },
                { 'data': 'date_in' },
                { 'data': 'date_out' },
                {
                    'data': 'room',
                    'render' : function (data, type, full) {
                        return (full['room'] && full['room']['number']) ? full['room']['number'] : 'TBA';
                    }
                },
                { 'data': 'booking_status.status' },
                {
                    'data': 'actions',
                    'render' : function (data, type, full) {
                        return `
                            <a href="/admin/bookings/`+full['id']+`" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i
                                class="fas fa-search"></i></a>
                            <a href="/admin/bookings/`+full['id']+`/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                    class="fas fa-edit"></i></a>
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" class="btn btn-danger btn-sm open-delete-modal" data-toggle="modal" data-target="#delete-booking-modal" data-id="`+full['id']+`" data-action="bookings"><i class="fas fa-trash"></i></a>
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