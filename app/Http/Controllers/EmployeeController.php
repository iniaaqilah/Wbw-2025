<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Departement;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil data departemen dan posisi untuk dropdown di form create
        $departements = Departement::orderBy('nama_departemen')->get();
        $positions = Position::orderBy('nama_jabatan')->get();

        return view('employees.create', compact('departements', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|in:aktif,nonaktif',
            'departemen_id'  => 'required|exists:departements,id',
            'jabatan_id'     => 'required|exists:positions,id',
        ]);

        Employee::create($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
            'departemen_id',
            'jabatan_id',
        ]));

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with(['departement', 'position'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);

        // data untuk dropdown
        $departements = Departement::orderBy('nama_departemen')->get();
        $positions = Position::orderBy('nama_jabatan')->get();

        return view('employees.edit', compact('employee', 'departements', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email,' . $id,
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|in:aktif,nonaktif',
            'departemen_id'  => 'required|exists:departements,id',
            'jabatan_id'     => 'required|exists:positions,id',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
            'departemen_id',
            'jabatan_id',
        ]));

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
