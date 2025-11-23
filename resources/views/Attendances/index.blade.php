@extends('master')
@section('title', 'Daftar Absensi')

@section('content')
<div class="container mt-5" style="background-color:#f6d8bd; padding:20px; border-radius:12px;">
    <h1 style="margin-bottom:20px;">Daftar Absensi Pegawai</h1>
    <a href="{{ route('attendances.create') }}" style="background-color:#3e2723;color:white;padding:10px 16px;text-decoration:none;border-radius:8px;">+ Tambah Data Absensi</a>
    <br><br>
    <table style="width:100%;border-collapse:collapse;background:white;border-radius:10px;overflow:hidden;">
        <thead style="background-color:#4e342e;color:white;">
            <tr>
                <th style="padding:10px;">No</th>
                <th style="padding:10px;">Nama Pegawai</th>
                <th style="padding:10px;">Tanggal</th>
                <th style="padding:10px;">Waktu Masuk</th>
                <th style="padding:10px;">Waktu Keluar</th>
                <th style="padding:10px;">Status</th>
                <th style="padding:10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attendances as $index => $attendance)
                <tr style="text-align:center;border-bottom:1px solid #ddd;">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $attendance->tanggal }}</td>
                    <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                    <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                    <td>{{ ucfirst($attendance->status_absensi) }}</td>
                    <td>
                        <a href="{{ route('attendances.edit', $attendance->id) }}" style="background-color:#8d6e63;color:white;padding:5px 10px;border-radius:6px;text-decoration:none;">Edit</a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data ini?')" style="background-color:#dc3545;color:white;padding:5px 10px;border:none;border-radius:6px;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="padding:12px;text-align:center;">Belum ada data absensi.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
