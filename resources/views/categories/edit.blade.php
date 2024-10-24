@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2>Edit Category</h2>
            <form method="POST" action="{{ route('categories.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}"
                        required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Category</button>
            </form>
        </div>
    </div>
@endsection
