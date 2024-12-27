/course/show.blade.php

@extends('layouts.app')

@section('content')
    <h1>{{ $course->title }}</h1>

    <p>{{ $course->description }}</p>

    <p><strong>Link Meet:</strong> <a href="{{ $course->link_meet }}">{{ $course->link_meet }}</a></p>

    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit Course</a>

    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Course</button>
    </form>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
@endsection