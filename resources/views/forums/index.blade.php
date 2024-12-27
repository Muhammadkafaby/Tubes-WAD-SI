<x-app-layout>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <a href="{{ route('forums.create') }}" class="btn btn-primary mb-3">Create Forum</a>
        @foreach($forums as $forum)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $forum->title }}</h5>
                    <p>{{ $forum->description }}</p>
                    <a href="{{ route('forums.show', $forum->id) }}" class="btn btn-sm btn-info">View Forum</a>
                </div>
            </div>
        @endforeach
    </div>
    @endsection
</x-app-layout>