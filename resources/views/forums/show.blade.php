@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $forum->title }}</h1>
    <p>{{ $forum->description }}</p>

    <h3>Pertanyaan</h3>
    <form action="{{ route('questions.store', $forum->id) }}" method="POST">
        @csrf
        <textarea name="question" class="form-control mb-3" placeholder="Tulis pertanyaan Anda di sini..." required></textarea>
        <button type="submit" class="btn btn-success">Tanya</button>
    </form>

    @foreach($forum->questions as $question)
        <div class="card mt-3">
            <div class="card-body">
                <strong>{{ $question->user->name }}</strong> bertanya:
                <p>{{ $question->question }}</p>
                <form action="{{ route('answers.store', $question->id) }}" method="POST">
                    @csrf
                    <textarea name="answer" class="form-control mb-3" placeholder="Tulis jawaban Anda di sini..." required></textarea>
                    <button type="submit" class="btn btn-primary">Jawab</button>
                </form>

                <h6>Jawaban:</h6>
                @foreach($question->answers as $answer)
                    <p>- <strong>{{ $answer->user->name }}</strong>: {{ $answer->answer }}</p>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection