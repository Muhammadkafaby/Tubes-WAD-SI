@extends('app')

@section('title', 'Testimonial Details')

@section('content')
    <h1>Testimonial Details</h1>
    <p><strong>ID:</strong> {{ $testimonial->id }}</p>
    <p><strong>User:</strong> {{ $testimonial->name }}</p>
    <p><strong>Category:</strong> {{ $testimonial->category }}</p>
    <p><strong>Testimonial:</strong> {{ $testimonial->testimonial }}</p>
    <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Back</a>
@endsection
