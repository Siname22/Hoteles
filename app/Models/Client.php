<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->get();
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeClient($query, $id)
    {
        return $query->where('user_id', $id);
    }
}
