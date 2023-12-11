<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'code',
        'payer'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
