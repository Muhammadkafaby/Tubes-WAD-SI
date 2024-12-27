@extends('layouts.app')

@section('content')
    <h1>Edit Course</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $course->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="link_meet">Link Meet</label>
            <input type="text" name="link_meet" id="link_meet" class="form-control" value="{{ $course->link_meet }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
@endsection