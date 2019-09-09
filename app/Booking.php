<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'email',
        'address',
        'adult',
        'children',
        'room_id',
        'room_type_id',
        'date_in',
        'date_out',
        'special_request',
        'extText1',
        'extText2',
        'extText3',
        'extNo1',
        'extNo2',
        'extNo3',
        'extDate1',
        'extDate2',
        'extDate3',
        'memo'
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
