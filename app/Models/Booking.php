<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function roomAssignment()
    {
        return $this->hasMany(RoomAssignment::class);
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeBookings($query, $id)
    {
        return $query->where('client_id', $id);
    }
}
