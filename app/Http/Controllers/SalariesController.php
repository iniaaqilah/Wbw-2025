<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salaries;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    public function index() {
        $salaries = Salaries::with('employee')->latest()->paginate(10);
        return view('pages.salaries.index', compact('salaries'));
    }

    public function create() {
        $employees = Employee::where('status', 'aktif')->get();
        return view('pages.salaries.create', compact('employees'));
    }

    public function store(Request $request) {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();

        $gaji_pokok = (float) $data['gaji_pokok'];
        $tunjangan = (float) $data['tunjangan'];
        $potongan = (float) $data['potongan'];

        $data['total_gaji'] = $gaji_pokok + $tunjangan - $potongan;

        Salaries::create($data);

        return redirect()->route('salaries.index')->with('success', 'Slip Gaji berhasil dibuat dan disimpan!');
    }

    public function show(Salaries $salary)
    {
        $salary->load('employee.position');

        return view('pages.salaries.show', compact('salary'));
    }
}
