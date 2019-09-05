<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'roomtype_id',
        'number',
        'price',
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

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function roomtype()
    {
        return $this->belongsTo(RoomType::class);
    }
}
