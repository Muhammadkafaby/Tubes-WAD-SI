@extends('layouts.app')

@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
@endphp

@section('content')
<x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Events</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 class="mt-4">Events</h3>
            </div>

            {{-- Hanya Admin yang bisa melihat tombol Create --}}
            @role('admin')
            <div class="col-sm-2" style="margin-top: 20px;">
                <a class="btn btn-primary" href="{{ route('events.create') }}">Create New Event</a>
            </div>
            @endrole
        </div> 
        <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>        
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="40px"><b>#</b></th>
                    <th width="180px">Title</th>
                    <th>Description</th>
                    <th width="150px">Event Date</th>
                    <th width="150px">Location</th>
                    <th width="150px">Image</th>

                    {{-- Hanya Admin yang bisa melihat kolom Actions --}}
                    @role('admin')
                    <th width="210px">Actions</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event) 
                    <tr>
                        <td><b>{{ $loop->iteration }}.<b></td>
                        <td>
                            <a href="{{ route('events.show', $event->id) }}" style="font-weight: bold; text-decoration: none;">
                                {{ $event->title }}
                            </a>
                        </td>
                        <td>{{ Str::limit($event->description, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y H:i') }}</td>
                        <td>{{ $event->location }}</td>
                        <td class="showPhoto">
                            @if ($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-fluid">
                            @else
                                <p>No image uploaded</p>
                            @endif
                        </td>

                        {{-- Hanya Admin yang bisa melihat tombol Edit dan Delete --}}
                        @role('admin')
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('events.edit', $event->id) }}">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<style>
    .showPhoto {
        width: 100px;
        height: 100px;
        margin: auto;
    }
</style>