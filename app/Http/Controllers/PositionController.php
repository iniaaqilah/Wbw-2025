<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $query = Position::query();

        // optional: cari berdasarkan nama_jabatan
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where('nama_jabatan', 'like', "%{$q}%");
        }

        $positions = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan',
            'gaji_pokok'   => 'required|numeric|min:0',
        ]);

        Position::create($request->only('nama_jabatan', 'gaji_pokok'));

        return redirect()->route('positions.index')->with('success', 'Posisi berhasil ditambahkan.');
    }

    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $position->id,
            'gaji_pokok'   => 'required|numeric|min:0',
        ]);

        $position->update($request->only('nama_jabatan', 'gaji_pokok'));

        return redirect()->route('positions.index')->with('success', 'Posisi berhasil diperbarui.');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Posisi berhasil dihapus.');
    }
}
