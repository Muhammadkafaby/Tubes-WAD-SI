@extends('app')

@section('title', 'Testimonials')

@section('content')
    <h1>Testimonials</h1>
    <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add New Testimonial</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Category</th>
                <th>Testimonial</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->category }}</td>
                    <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>
                    <td>
                        <a href="{{ route('testimonials.show', $testimonial->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
