<div class="card">
    <div class="card-header">
        Purchases
        <span class="badge badge-pill badge-info text-white">{{ $count['purchases'] }}</span>
    </div>

    <div class="card-body">
        <table class="table table-borderless table-striped table-sm">
            <thead class="">
                <tr>
                    <th scope="col">Room No.</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->booking->room->number }}</td>
                    <td>{{ $purchase->origin }}</td>
                    <td>{{ str_limit($purchase->description, $limit = 40, $end = '...') }}</td>
                    <td>&#8369; {{ $purchase->price }}</td>
                    <td>{{ $purchase->date->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            @if($count['purchases'] > 0)
                <a href="/admin/purchases">Show all</a>
            @endif
        </div>
    </div>
</div>
