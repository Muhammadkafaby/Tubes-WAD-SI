<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $testimonials = Testimonial::all();

        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data input dari form
        $validatedData = $request->validate([
            'user_id' => 'required|exists:user_id', //memastikan user_id ada dan valid
            'name' => 'required|string',
            'category' => 'required|string',
            'testimonials' => 'required|string',
        ]);

        //Menyimpan testimoni baru ke database
        Testimonial::create($validatedData);

        return redirect()->route('testimonials.index')->with('success', 'Ulasan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Mengambil testimoni berdasarkan id
        $testimonial = Testimonial::findOrFail($id);

        // Menampilkan halaman
        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil testimoni yang akan diedit
        $testimonial = Testimonial::findOrFail($id);

        return view('testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validasi data input dari form
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'category' => 'required|string',
            'testimonials' => 'required|string',
        ]);

        // Menemukan testimoni berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);

        // Memperbarui data testimoni
        $testimonial->update($validatedData);

        // Redirect ke halaman index testimoni
        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan testimoni berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);
        
        // Menghapus testimoni
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
