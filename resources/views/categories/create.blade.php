@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2>Add Category</h2>
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Category</button>
            </form>
        </div>
    </div>
@endsection
