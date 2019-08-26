<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Room;
use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Booking $booking, Room $room, Purchase $purchase)
    {
        $bookings = $booking->orderBy('date_in', 'asc')->limit(5)->get();
        $rooms = $room->orderBy('roomtype_id', 'asc')->limit(5)->get();
        $purchases = $purchase->orderBy('date', 'asc')->limit(5)->get();
        $count = [
            'bookings' => $booking->count(),
            'rooms' => $room->count(),
            'purchases' => $purchase->count()
        ];

        return view('admin.home', compact('bookings', 'rooms', 'purchases', 'count'));
    }
}
