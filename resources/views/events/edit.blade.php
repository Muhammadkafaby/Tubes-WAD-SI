@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Event</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="form-row">
            <div class="col-lg-12">
                <h3>Edit Event</h3>
            </div>
        </div>
        <br>

        @if ($errors->all())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Event Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" value="{{ $event->title }}" placeholder="Event Title">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Event Description">{{ $event->description }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="event_date" class="col-sm-2 col-form-label">Event Date</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="event_date" class="form-control" id="event_date" value="{{ $event->event_date }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="location" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                    <input type="text" name="location" class="form-control" id="location" value="{{ $event->location }}" placeholder="Event Location">
                </div>
            </div>
            @csrf
            <!-- Image -->
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            <hr>
            <div class="form-group">
                <a href="{{ route('events.index') }}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
    </body>
</html>

@endsection
