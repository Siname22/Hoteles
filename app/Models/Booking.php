<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function get_client()
    {
        return $this->belongsTo(Client::class);
    }

    public function get_room_bookings()
    {
        return $this->hasMany(Room_booking::class);
    }
}
