<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class BookingRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'event_id' => ['required', 'exists:events,id'],
            'payer' => ['required', 'string'],
            'visitors.*.name' => ['required']
        ];
    }
}
