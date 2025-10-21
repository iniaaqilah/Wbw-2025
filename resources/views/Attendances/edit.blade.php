@extends('master')
@section('title', 'Edit Absensi')

@section('content')
<div style="background-color:#d7ccc8;padding:20px;border-radius:10px;">
    <h2>Edit Data Absensi</h2>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Pegawai:</label>
        <select name="karyawan_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $attendance->karyawan_id == $employee->id ? 'selected' : '' }}>
                    {{ $employee->nama_lengkap }}
                </option>
            @endforeach
        </select><br><br>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="{{ $attendance->tanggal }}"><br><br>

        <label>Waktu Masuk:</label>
        <input type="time" name="waktu_masuk" value="{{ $attendance->waktu_masuk }}"><br><br>

        <label>Waktu Keluar:</label>
        <input type="time" name="waktu_keluar" value="{{ $attendance->waktu_keluar }}"><br><br>

        <label>Status:</label>
        <select name="status_absensi">
            @foreach(['hadir','izin','sakit','alpha'] as $status)
                <option value="{{ $status }}" {{ $attendance->status_absensi == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select><br><br>

        <button type="submit" style="background-color:#3e2723;color:white;padding:10px 16px;border:none;border-radius:8px;">Update</button>
    </form>
</div>
@endsection
