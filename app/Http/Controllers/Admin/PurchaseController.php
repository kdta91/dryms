<?php

namespace App\Http\Controllers\Admin;

use App\Purchase;
use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Purchase $purchase)
    {
        $purchases = $purchase->orderBy('date', 'asc')->paginate(10);

        return view('admin.purchases.index', compact('purchases'));
    }

    public function getPurchases()
    {
        $query = Purchase::with('booking')->select('*');

        return datatables($query)
            ->editColumn('booking_id', function ($booking) {
                return $booking->booking->room->number;
            })
            ->editColumn('date', function ($booking) {
                return $booking->date->format('M d, Y');
            })
            ->addColumn('actions', function ($booking) {
                return '';
            })
            ->make(true);
    }

    public function create(Booking $booking)
    {
        $bookings = $booking->where('booking_status_id', '2')->orderBy('id', 'asc')->get();

        return view('admin.purchases.create', compact('bookings'));
    }

    public function store()
    {
        $data = request()->validate([
            'booking_id' => 'required',
            'origin' => 'required',
            'description' => 'required',
            'price' => 'required',
            'date' => 'required|date'
        ]);

        Purchase::create([
            'booking_id' => $data['booking_id'],
            'origin' => $data['origin'],
            'description' => $data['description'],
            'price' => $data['price'],
            'date' => $data['date']
        ]);

        return redirect('/admin/purchases')->with('success', 'Purchase successfully added');
    }

    public function show(Purchase $purchase)
    {
        return view('admin.purchases.show', compact('purchase'));
    }

    public function edit(Purchase $purchase, Booking $booking)
    {
        $bookings = $booking->where('booking_status_id', '2')->orderBy('id', 'asc')->get();

        return view('admin.purchases.edit', compact('purchase', 'bookings'));
    }

    public function update(Purchase $purchase)
    {
        $data = request()->validate([
            'booking_id' => 'required',
            'origin' => 'required',
            'description' => 'required',
            'price' => 'required',
            'date' => 'required|date'
        ]);

        Purchase::where('id', $purchase->id)->update([
            'booking_id' => $data['booking_id'],
            'origin' => $data['origin'],
            'description' => $data['description'],
            'price' => $data['price'],
            'date' => $data['date']
        ]);

        return redirect('/admin/purchases/'.$purchase->id)->with('success', 'Purchase successfully updated');
    }

    public function destroy(Purchase $purchase)
    {
        $delete = Purchase::where('id', $purchase->id)->delete();

        $data = ($delete) ? ['status' => 1] : ['status' => 0];

        session()->flash('success', 'Purchase successfully deleted');

        return response()->json($data);
    }
}
