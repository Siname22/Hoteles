<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_booking extends Model
{
    use HasFactory;

    public function get_booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function get_room()
    {
        return $this->belongsTo(Room::class);
    }
}
