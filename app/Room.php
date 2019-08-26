<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'room_typeid', 'number', 'price', 'description', 'image'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function roomtype()
    {
        return $this->belongsTo(RoomType::class);
    }
}
