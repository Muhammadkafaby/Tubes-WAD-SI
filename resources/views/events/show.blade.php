@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Event Details</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="form-row">
            <div class="col-lg-12">
                <h3 class="mt-4">Event Details</h3>
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label for="eventTitle" class="col-sm-2 col-form-label">Event Title</label>
            <div class="col-sm-10">
                {{ $event->title }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDescription" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                {{ $event->description }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                {{ $event->event_date }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
                {{ $event->location }}
            </div>
        </div>
        <!-- image -->
        <div class="form-group">
            <label for="image">Image:</label>
            @if ($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-fluid showPhoto">
            @else
            <p>No image uploaded</p>
            @endif
        </div>
        

        <div class="form-group row">
            <div class="col-md-12">
                <a href="{{ route('events.index') }}" class="btn btn-success">Back</a>
            </div>
        </div>

    </div>
</body>
</html>

@endsection

<style>
    .showPhoto {
        width: 100px;
        height: 100px;
        margin: left;
    }
</style>