<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::all();
    }

    public function store(BookingRequest $request)
    {
        $booking = Booking::create([
            'code' => Str::random(5)
        ] + $request->validated());
        return $booking;
    }

    public function show(Booking $booking)
    {
        return [
            'id' => $booking->id,
            'event' => $booking->event->name,
            'another_booking' => $booking->event->bookings,
            'code' => $booking->code,
            'payer' => $booking->payer,
        ];
    }
}
