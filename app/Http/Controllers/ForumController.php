<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::with('user')->latest()->get();
        return view('forums.index', compact('forums'));
    }

    public function create()
    {
        return view('forums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Forum::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('forums.index')->with('success', 'Forum created successfully!');
    }

    public function show(Forum $forum)
    {
        $forum->load('questions.user', 'questions.answers.user'); // Load pertanyaan, user, dan jawaban
        return view('forums.show', compact('forum'));
    }

}
