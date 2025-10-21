<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::latest()->paginate(10);
        return view('departements.index', compact('departements'));
    }

    public function create()
    {
        return view('departements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departements,nama_departemen',
        ]);

        Departement::create($request->only('nama_departemen'));

        return redirect()->route('departements.index')
                         ->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function show(Departement $departement)
    {
        return view('departements.show', compact('departement'));
    }

    public function edit(Departement $departement)
    {
        return view('departements.edit', compact('departement'));
    }

    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departements,nama_departemen,' . $departement->id,
        ]);

        $departement->update($request->only('nama_departemen'));

        return redirect()->route('departements.index')
                         ->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')
                         ->with('success', 'Departemen berhasil dihapus.');
    }
}
