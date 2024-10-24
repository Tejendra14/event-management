@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2>Edit Event</h2>
            <form method="POST" action="{{ route('events.update', $event->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Event Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $event->title }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="date">Event Date</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ $event->date }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="description">Event Description</label>
                    <textarea class="form-control" name="description" id="description" required>{{ $event->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="location">Event Location</label>
                    <input type="text" class="form-control" name="location" id="location" value="{{ $event->location }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update Event</button>
            </form>
        </div>
    </div>
@endsection
