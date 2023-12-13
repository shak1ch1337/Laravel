<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'date' => ['required', 'date_format:Y-m-d'],
            'image' => ['required', 'file', 'mimes:png, jpg, jpeg']
        ];
    }
}
