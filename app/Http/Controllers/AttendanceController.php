<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index() {
        $attendances = Attendance::with('employee')->latest()->paginate(10);
        return view('pages.attendances.index', compact('attendances'));
    }

    public function create() {
        $employees = Employee::where('status', 'aktif')->get();
        return view('pages.attendances.create', compact('employees'));
    }

    public function store(Request $request) {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Absensi berhasil dicatat dan disimpan!');
    }

     public function show(Attendance $attendance)
    {
        // Memuat relasi 'employee' (dan relasi 'position' dari employee)
        $attendance->load('employee.position');

        return view('pages.attendances.show', compact('attendance'));
    }
}
