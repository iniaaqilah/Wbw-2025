@extends('master')
@section('title', 'Tambah Data Absensi')

@section('content')
<div style="background-color:#d7ccc8;padding:20px;border-radius:10px;">
    <h2>Tambah Data Absensi</h2>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <label>Pegawai:</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
            @endforeach
        </select><br><br>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" required><br><br>

        <label>Waktu Masuk:</label>
        <input type="time" name="waktu_masuk"><br><br>

        <label>Waktu Keluar:</label>
        <input type="time" name="waktu_keluar"><br><br>

        <label>Status:</label>
        <select name="status_absensi" required>
            <option value="hadir">Hadir</option>
            <option value="izin">Izin</option>
            <option value="sakit">Sakit</option>
            <option value="alpha">Alpha</option>
        </select><br><br>

        <button type="submit" style="background-color:#3e2723;color:white;padding:10px 16px;border:none;border-radius:8px;">Simpan</button>
    </form>
</div>
@endsection
