<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'booking_id', 'origin', 'description', 'price', 'date'
    ];

    protected $dates = [
        'date'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
