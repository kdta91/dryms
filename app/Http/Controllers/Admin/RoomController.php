<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Room $room)
    {
        // $rooms = $room->orderBy('roomtype_id', 'asc')->paginate(10);
        $rooms = $room->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function getRooms()
    {
        $query = Room::with('roomtype')->select('*');

        return datatables($query)
            ->addColumn('actions', function ($booking) {
                return '';
            })
            ->make(true);
    }

    public function create(RoomType $roomtype)
    {
        $roomtypes = $roomtype->orderBy('id', 'asc')->get();

        return view('admin.rooms.create', compact('roomtypes'));
    }

    public function store()
    {
        $data = request()->validate([
            'roomtype_id' => 'required',
            'number' => 'required',
            'price' => 'required'
        ]);

        Room::create([
            'roomtype_id' => $data['roomtype_id'],
            'number' => $data['number'],
            'price' => $data['price']
        ]);

        return redirect('/admin/rooms')->with('success', 'Room successfully added');
    }

    public function show(Room $room)
    {
        return view('admin.rooms.show', compact('room'));
    }

    public function edit(Room $room, RoomType $roomtype)
    {
        $roomtypes = $roomtype->orderBy('id', 'asc')->get();

        return view('admin.rooms.edit', compact('room', 'roomtypes'));
    }

    public function update(Room $room)
    {
        $data = request()->validate([
            'roomtype_id' => 'required',
            'number' => 'required',
            'price' => 'required'
        ]);

        Room::where('id', $room->id)->update([
            'roomtype_id' => $data['roomtype_id'],
            'number' => $data['number'],
            'price' => $data['price']
        ]);

        return redirect('/admin/rooms/'.$room->id)->with('success', 'Room successfully updated');
    }

    public function destroy(Room $room)
    {
        $delete = Room::where('id', $room->id)->delete();

        $data = ($delete) ? ['status' => 1] : ['status' => 0];

        session()->flash('success', 'Room successfully deleted');

        return response()->json($data);
    }
}
