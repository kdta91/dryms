<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
