@extends('app')

@section('title', 'Create Testimonial')

@section('content')
    <h1>Create Testimonial</h1>
    <form action="{{ route('testimonials.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ old('user_id') }}" required>
            @error('user_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" required>
            @error('category')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label for="testimonial" class="form-label">Testimonial</label>
            <textarea class="form-control" id="testimonial" name="testimonial" rows="3" required>{{ old('testimonial') }}</textarea>
            @error('testimonial')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
