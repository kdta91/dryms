<?php

namespace App\Http\Controllers\Admin;

use App\Receipt;
use App\Purchase;
use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ReceiptController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Booking $booking)
    {
        // $bookings = $booking->orderBy('date_in', 'asc')->paginate(10);
        $receipts = $booking->get();

        return view('admin.receipts.index', compact('receipts'));
    }

    public function getReceipts()
    {
        $query = Booking::with('room', 'bookingStatus', 'purchases')->select('*');

        return datatables($query)
            ->addColumn('actions', function ($booking) {
                return '';
            })
            ->addColumn('name', function ($booking) {
                return $booking->first_name . ' ' . $booking->last_name;
            })
            // ->editColumn('room_number', function ($booking) {
            //      return $booking->room['number'] ? $booking->room['number'] : 'TBA';
            // })
            ->editColumn('date_in', function ($booking) {
                return $booking->date_in->format('M d, Y');
            })
            ->editColumn('date_out', function ($booking) {
                return $booking->date_out->format('M d, Y');
            })
            // ->editColumn('booking_status_id', function ($booking) {
            //     return $booking->bookingStatus->status;
            // })
            ->make(true);
    }

    public function create(Room $room)
    {
        $minDate = Carbon::today()->toDateString();
        $rooms = $room->orderBy('number', 'asc')->get();

        return view('admin.bookings.create', compact('minDate', 'rooms'));
    }

    public function store()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'room_id' => 'nullable',
            'booking_date' => 'required',
            // 'date_in' => 'required|date',
            // 'date_out' => 'required|date',
            'special_request' => 'nullable'
        ]);

        $booking_date = explode(' - ', $data['booking_date']);

        Booking::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'contact_number' => $data['contact_number'],
            'address' => $data['address'],
            'room_id' => $data['room_id'],
            'date_in' => Carbon::parse($booking_date[0]),
            'date_out' => Carbon::parse($booking_date[1]),
            'special_request' => $data['special_request'],
            'booking_status_id' => (!empty($data['room_id'])) ? 2 : 1
        ]);

        return redirect('/admin/bookings')->with('success', 'Booking successfully added');
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking, Room $room)
    {
        $rooms = $room->orderBy('number', 'asc')->get();

        return view('admin.bookings.edit', compact('booking', 'rooms'));
    }

    public function update(Booking $booking)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'room_id' => 'nullable',
            'booking_date' => 'required',
            // 'date_in' => 'required|date',
            // 'date_out' => 'required|date',
            'special_request' => 'nullable'
        ]);

        $booking_date = explode(' - ', $data['booking_date']);

        Booking::where('id', $booking->id)->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'contact_number' => $data['contact_number'],
            'address' => $data['address'],
            'room_id' => $data['room_id'],
            'date_in' => Carbon::parse($booking_date[0]),
            'date_out' => Carbon::parse($booking_date[1]),
            'special_request' => $data['special_request'],
            'booking_status_id' => (!empty($data['room_id'])) ? 2 : 1
        ]);

        return redirect('/admin/bookings/'.$booking->id)->with('success', 'Booking successfully updated');
    }

    public function destroy(Booking $booking)
    {
        $delete = Booking::where('id', $booking->id)->delete();

        $data = ($delete) ? ['status' => 1] : ['status' => 0];

        session()->flash('success', 'Booking successfully deleted');

        return response()->json($data);
    }
}
