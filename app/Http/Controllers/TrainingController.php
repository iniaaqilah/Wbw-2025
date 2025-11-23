<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Employee;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::with('employee')->latest()->paginate(10);
        return view('trainings.index', compact('trainings'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('trainings.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'nama_pelatihan' => 'required|string|max:150',
            'penyelenggara' => 'nullable|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'sertifikasi_no' => 'nullable|string|max:50|unique:trainings,sertifikasi_no',
        ]);

        Training::create($request->all());

        return redirect()->route('trainings.index')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }

    public function show(Training $training)
    {
        return view('trainings.show', compact('training'));
    }

    public function edit(Training $training)
    {
        $employees = Employee::all();
        return view('trainings.edit', compact('training', 'employees'));
    }

    public function update(Request $request, Training $training)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'nama_pelatihan' => 'required|string|max:150',
            'penyelenggara' => 'nullable|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'sertifikasi_no' => 'nullable|string|max:50|unique:trainings,sertifikasi_no,' . $training->id,
        ]);

        $training->update($request->all());
        return redirect()->route('trainings.index')->with('success', 'Data pelatihan berhasil diperbarui.');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('trainings.index')->with('success', 'Data pelatihan berhasil dihapus.');
    }
}