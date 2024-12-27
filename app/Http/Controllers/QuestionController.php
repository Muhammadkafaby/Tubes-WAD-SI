<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request, Forum $forum)
    {
        $request->validate(['question' => 'required|string']);

        $forum->questions()->create([
            'question' => $request->question,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Question added successfully!');
    }
}
