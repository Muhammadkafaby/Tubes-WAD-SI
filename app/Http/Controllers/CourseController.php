<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Method untuk menampilkan semua course
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    // Method untuk menampilkan detail course berdasarkan ID
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }

        return view('course.show', compact('course'));
    }

    // Method untuk menampilkan form pembuatan course baru
    public function create()
    {
        return view('course.create');
    }

    // Method untuk menyimpan course baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link_meet' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    // Method untuk menampilkan form edit course berdasarkan ID
    public function edit($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }

        return view('course.edit', compact('course'));
    }

    // Method untuk mengupdate course yang ada di database berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link_meet' => 'required',
        ]);

        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    // Method untuk menghapus course dari database berdasarkan ID
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}