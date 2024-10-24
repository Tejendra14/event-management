@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Attendees for Event</h2> <!-- Display the event title -->
                <a href="{{ route('attendees.create') }}" class="btn btn-success mb-3">Add Attendee</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Event</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendees as $attendee)
                        <tr>
                            <td>{{ $attendee->id }}</td>
                            <td>{{ $attendee->name }}</td>
                            <td>{{ $attendee->email }}</td>
                            <td>{{ $attendee->event->title ?? 'N/A' }}</td> <!-- Display event title -->
                            <td class="d-flex">
                                <a href="{{ route('attendees.edit', $attendee->id) }}"
                                    class="btn btn-warning btn-sm me-2 mr-2">Edit</a>
                                <form action="{{ route('attendees.destroy', $attendee->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
