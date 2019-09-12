<div class="card">
    <div class="card-header">
        Bookings
        <span class="badge badge-pill badge-info text-white">{{ $count['bookings'] }}</span>
    </div>

    <div class="card-body">
        <table class="table table-borderless table-striped table-sm">
            <thead class="">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Room No.</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->first_name . ' ' . $booking->last_name }}</td>
                    <td>{{ $booking->date_in->format('M d, Y') }} - {{ $booking->date_out->format('M d, Y') }}</td>
                    <td>{{ ($booking->room_number) ? $booking->room_number : 'TBA' }}</td>
                    <td>{{ $booking->bookingstatus->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            @if($count['bookings'] > 0)
                <a href="/admin/bookings">Show all</a>
            @endif
        </div>
    </div>
</div>
