<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'image'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getSomeBookings()
    {
        return $this->bookings()->where('code', 'ufldm')->get();
    }
}
