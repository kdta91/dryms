<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
