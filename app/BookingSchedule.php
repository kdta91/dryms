<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingSchedule extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'booking_id', 'room_id', 'roomtype_id', 'booking_status_id', 'date_in', 'date_out'
    ];

    protected $dates = [
        'date_in', 'date_out'
    ];
}