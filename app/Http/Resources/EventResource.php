<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BookingResource;

class EventResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "date" => $this->date,
            "booking" => BookingResource::collection($this->bookings)
        ];
    }
}
