<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Tampilkan semua event
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Tampilkan form create event
    public function create()
    {
        return view('events.create');
    }

    // Simpan event baru
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Simpan ke public storage
            $validatedData['image'] = $imagePath; // Tambahkan path gambar ke data yang divalidasi
        }

        // Simpan data ke database
        Event::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    // Tampilkan form edit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Update event yang sudah ada
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hapus gambar lama jika ada file baru yang diunggah
        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image); // Hapus gambar lama
            }
            $imagePath = $request->file('image')->store('images', 'public'); // Simpan file baru
            $validatedData['image'] = $imagePath; // Tambahkan path gambar ke data yang divalidasi
        }

        // Update data event
        $event->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        // Hapus data event
        $event->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

    // Tampilkan detail event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }
}
