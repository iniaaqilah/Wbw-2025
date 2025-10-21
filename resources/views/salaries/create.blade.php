@extends('master')
@section('title', 'Tambah Gaji Pegawai')

@section('content')
<div style="background-color:#d7ccc8;padding:20px;border-radius:10px;">
    <h2>Tambah Data Gaji</h2>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <label>Pegawai:</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
            @endforeach
        </select><br><br>

        <label>Bulan:</label>
        <input type="text" name="bulan" placeholder="Contoh: Januari" required><br><br>

        <label>Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" step="0.01" required><br><br>

        <label>Tunjangan:</label>
        <input type="number" name="tunjangan" step="0.01" value="0"><br><br>

        <label>Potongan:</label>
        <input type="number" name="potongan" step="0.01" value="0"><br><br>

        <button type="submit" style="background-color:#3e2723;color:white;padding:10px 16px;border:none;border-radius:8px;">Simpan</button>
    </form>
</div>
@endsection
