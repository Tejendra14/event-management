<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index(Event $event)
    {

        $attendees = Attendee::all();
        return view('attendees.index', compact('event', 'attendees'));
    }


    public function create()
    {
        $events = Event::all(); // Retrieve all events
        return view('attendees.create', compact('events'));
    }

    public function store(Request $request, Event $event)
    {
        // validation this can be done following the single responsibilty principle but i am doing here
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'event_id' => 'required|exists:events,id',
        ]);

        Attendee::create([
            'name' => $request->name,
            'email' => $request->email,
            'event_id' => $request->event_id,
        ]);

        return redirect()->route('attendees.index', $event)->with('success', 'Attendee added successfully.');
    }

    public function edit($id)
    {
        $attendee = Attendee::findOrFail($id);
        $events = Event::all();
        return view('attendees.edit', compact('attendee', 'events'));
    }

    public function update(Request $request, Event $event, Attendee $attendee)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $attendee->update($request->all());

        return redirect()->route('attendees.index', $event)->with('success', 'Attendee updated successfully.');
    }

    public function destroy(Event $event, Attendee $attendee)
    {
        $attendee->delete();

        return redirect()->route('attendees.index', $event)->with('success', 'Attendee deleted successfully.');
    }
}