<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekruit;

use function Ramsey\Uuid\v1;

class RekruitController extends Controller
{
    public function index()
    {
        $rekruits = Rekruit::all();
        return view('rekruits.index', compact('rekruits)'));
    }

    public function create()
    {
        $rekruits = Rekruit::all();
        return view('rekruits.create');    
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string|unique:rekruits',
            'kelas' => 'required|string',
            'semester' => 'required|string',
            'angkatan' => 'required|string',
            'no_telepon' => 'required|string|unique:rekruits',
            'email' => 'required|string',
            'tentor_matkul' => 'required|string',
            'nilai_matkul' => 'required|string',
            'IPK' => 'required|string',
            'pengalaman_mentor' => 'required|text',
            'alasan' => 'required|text',
            'program' => 'required|text',
        ]);

        Rekruit::create($validatedData);

        return redirect()->route('rekruits.index');

    }

    public function edit(Rekruit $rekruit)
    {
        return view('rekruits.edit', compact('rekruits'));
    }

    public function update(Request $request, Rekruit $rekruit)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string|unique:rekruits',
            'kelas' => 'required|string',
            'semester' => 'required|string',
            'angkatan' => 'required|string',
            'no_telepon' => 'required|string|unique:rekruits',
            'email' => 'required|string',
            'tentor_matkul' => 'required|string',
            'nilai_matkul' => 'required|string',
            'IPK' => 'required|string',
            'pengalaman_mentor' => 'required|text',
            'alasan' => 'required|text',
            'program' => 'required|text',
        ]);

        $rekruit->update($validatedData);

        return redirect()->route('rekruits.index');

    }

    public function destroy(Rekruit $rekruit)
    {
        $rekruit->delete();

        return redirect()->route('rekruits.index');
    }
}
