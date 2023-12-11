<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(Event::all());
    }

    public function store(Request $request)
    {
        $event = Event::create($request->all());
        return $event;
    }

    public function show(Event $event)
    {
        return new EventResource($event);
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return [
            'message' => 'Event was updated!'
        ];
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return [
            'message' => 'Event was deleted'
        ];
    }
}
