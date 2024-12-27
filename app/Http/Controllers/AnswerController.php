<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $request->validate(['answer' => 'required|string']);

        $question->answers()->create([
            'answer' => $request->answer,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Jawaban berhasil ditambahkan!');
    }
}