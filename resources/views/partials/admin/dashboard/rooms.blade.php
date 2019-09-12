<div class="card">
    <div class="card-header">
        Rooms
        <span class="badge badge-pill badge-info text-white">{{ $count['rooms'] }}</span>
    </div>

    <div class="card-body">
        <table class="table table-borderless table-striped table-sm">
            <thead class="">
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->roomtype->type }}</td>
                    <td>&#8369; {{ $room->roomtype->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            @if($count['rooms'] > 0)
                <a href="/admin/rooms">Show all</a>
            @endif
        </div>
    </div>
</div>
