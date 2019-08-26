<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Booking;
use App\BookingSchedule;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index(Room $rooms)
    {
        $booking_date = explode(' - ', request()->post('booking_date'));
        $date_in = Carbon::parse($booking_date[0]);
        $date_out = Carbon::parse($booking_date[1]);
        $adults = request()->post('adult');
        $children = request()->post('children');

        var_dump($date_in);
        var_dump($date_out);
        var_dump($adults);
        var_dump($children);

        request()->session()->put('date_in', $date_in);
        request()->session()->put('date_out', $date_out);
        request()->session()->put('adults', $adults);
        request()->session()->put('children', $children);

        return response()->json(['success' => true]);
    }

    public function create(Booking $Booking)
    {
        $minDate = Carbon::today()->toDateString();

        return view('customer.booking.create', compact('minDate'));
        // return view('partials.customer.book');
    }

    public function store()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'booking_date' => 'required',
            // 'date_in' => 'required|date',
            // 'date_out' => 'required|date',
            'remarks' => 'nullable'
        ]);

        $booking_date = explode(' - ', $data['booking_date']);

        Booking::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'contact_number' => $data['contact_number'],
            'address' => $data['address'],
            'date_in' => Carbon::parse($booking_date[0]),
            'date_out' => Carbon::parse($booking_date[1]),
            'remarks' => $data['remarks']
        ]);

        return response()->json(['success' => 'Thank you for booking with us']);
    }

    public function showRooms(RoomType $room_type, Room $room)
    {
        $date_in = request()->session()->get('date_in');
        $date_out = request()->session()->get('date_out');
        $adults = request()->session()->get('adults');
        $children = request()->session()->get('children');
        $guests = $adults + $children;

        // var_dump($date_in);
        // var_dump($date_out);
        // var_dump($adults);
        // var_dump($children);
        // var_dump('Guests: ' . $guests);

        $schedules = BookingSchedule::whereNotBetween('date_in', [$date_in, $date_out])->whereNotBetween('date_out', [$date_in, $date_out])->get();
        $room_ids = array();
        $room_types = $room_type->where('capacity', '>=', $guests)->get();
        $room_type_ids = array();

        foreach ($schedules as $schedule) {
            array_push($room_ids, $schedule->room_id);
        }

        foreach ($room_types as $room_type) {
            array_push($room_type_ids, $room_type->id);
        }

        $rooms = $room->with('roomtype')->whereNotIn('id', $room_ids)->whereIn('roomtype_id', $room_type_ids)->get();

        // var_dump($rooms);

        return view('partials.customer.book', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('customer.room.show', compact('room'));
    }
}
