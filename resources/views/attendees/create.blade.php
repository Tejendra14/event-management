@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2>Add Attendee</h2>
            <form method="POST" action="{{ route('attendees.store') }}">
                @csrf

                <div class="form-group">
                    <label for="event_id">Select Event</label>
                    <select class="form-control" name="event_id" id="event_id" required>
                        <option value="">-- Select Event --</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}">{{ $event->title }} ({{ $event->date }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Attendee Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Attendee Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Add Attendee</button>
            </form>
        </div>
    </div>
@endsection
