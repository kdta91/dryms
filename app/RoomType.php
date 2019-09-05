<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'type', 'capacity', 'price', 'description', 'location', 'image'
    ];

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}