<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'booking_id',
        'origin',
        'description',
        'price',
        'date',
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
        'date'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
