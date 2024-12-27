@extends('app')

@section('title', 'Edit Testimonial')

@section('content')
    <h1>Edit Testimonial</h1>
    <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $testimonial->user_id }}" required>
            @error('user_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $testimonial->name }}" required>
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $testimonial->category }}" required>
            @error('category')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label for="testimonial" class="form-label">Testimonial</label>
            <textarea class="form-control" id="testimonial" name="testimonial" rows="3" required>{{ $testimonial->testimonial }}</textarea>
            @error('testimonial')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
