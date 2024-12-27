@extends('layouts.app')

@section('content')
    <h1>Create New Course</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="link_meet">Link Meet</label>
            <input type="text" name="link_meet" id="link_meet" class="form-control" value="{{ old('link_meet') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Course</button>
    </form>
@endsection