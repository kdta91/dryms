<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'first_name', 'last_name', 'contact_number', 'email', 'address', 'adult', 'children', 'room_id', 'date_in', 'date_out'
    ];

    protected $dates = [
        'date_in', 'date_out'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function bookingStatus()
    {
        return $this->belongsTo(BookingStatus::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
