@extends('master')
@section('title', 'Edit Data Gaji')

@section('content')
<div style="background-color:#d7ccc8;padding:20px;border-radius:10px;">
    <h2>Edit Data Gaji</h2>
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Pegawai:</label>
        <select name="karyawan_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $salary->karyawan_id == $employee->id ? 'selected' : '' }}>
                    {{ $employee->nama_lengkap }}
                </option>
            @endforeach
        </select><br><br>

        <label>Bulan:</label>
        <input type="text" name="bulan" value="{{ $salary->bulan }}" required><br><br>

        <label>Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" value="{{ $salary->gaji_pokok }}" step="0.01" required><br><br>

        <label>Tunjangan:</label>
        <input type="number" name="tunjangan" value="{{ $salary->tunjangan }}" step="0.01"><br><br>

        <label>Potongan:</label>
        <input type="number" name="potongan" value="{{ $salary->potongan }}" step="0.01"><br><br>

        <button type="submit" style="background-color:#3e2723;color:white;padding:10px 16px;border:none;border-radius:8px;">Update</button>
    </form>
</div>
@endsection
