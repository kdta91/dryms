<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Usertype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $users = $user->orderBy('usertype_id', 'asc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create(Usertype $usertype)
    {
        $usertypes = $usertype->get();

        return view('admin.users.create', compact('usertypes'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype_id' => 'nullable'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'usertype_id' => $data['usertype_id'],
        ]);

        return redirect('/admin/users')->with('success', 'User successfully added');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user, Usertype $usertype)
    {
        $usertypes = $usertype->get();

        return view('admin.users.edit', compact('user', 'usertypes'));
    }

    public function update(User $user)
    {
        // $data = request()->validate([
        //     'roomtype_id' => 'required',
        //     'number' => 'required',
        //     'price' => 'required'
        // ]);

        // Room::where('id', $room->id)->update([
        //     'roomtype_id' => $data['roomtype_id'],
        //     'number' => $data['number'],
        //     'price' => $data['price']
        // ]);

        // return redirect('/admin/rooms/'.$room->id)->with('success', 'Room successfully updated');
    }

    public function destroy(User $user)
    {
        $delete = $user->where('id', $user->id)->delete();

        $data = ($delete) ? ['status' => 1] : ['status' => 0];

        session()->flash('success', 'User successfully deleted');

        return response()->json($data);
    }
}
