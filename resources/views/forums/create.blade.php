@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('forums.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul Forum</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Forum</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Buat Forum</button>
    </form>
</div>
@endsection
