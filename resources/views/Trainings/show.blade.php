@extends('master')
@section('title', 'Detail Pelatihan Pegawai')

@section('content')
<div style="background-color:#f2e3d5; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); max-width:800px; margin:auto;">
    <h2 style="color:#3e2723;">Detail Pelatihan</h2>
    
    <table style="width:100%; border-collapse:collapse; margin-top:15px;">
        <tr style="background-color:#4e342e; color:white;">
            <th style="text-align:left; padding:10px; width:30%;">Field</th>
            <th style="text-align:left; padding:10px;">Data</th>
        </tr>
        <tr>
            <td style="padding:10px;">Nama Pegawai</td>
            <td style="padding:10px;">{{ $training->employee->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Nama Pelatihan</td>
            <td style="padding:10px;">{{ $training->nama_pelatihan }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Penyelenggara</td>
            <td style="padding:10px;">{{ $training->penyelenggara ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Tanggal Mulai</td>
            <td style="padding:10px;">{{ $training->tanggal_mulai }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Tanggal Selesai</td>
            <td style="padding:10px;">{{ $training->tanggal_selesai ?? 'Belum Selesai / N/A' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Nomor Sertifikasi</td>
            <td style="padding:10px;">{{ $training->sertifikasi_no ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Catatan</td>
            <td style="padding:10px; white-space: pre-wrap;">{{ $training->catatan ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Dibuat</td>
            <td style="padding:10px;">{{ $training->created_at->format('d M Y H:i') }}</td>
        </tr>
    </table>

    <div style="margin-top:20px;">
        <a href="{{ route('trainings.index') }}" style="background-color:#8d6e63;color:white;padding:8px 14px;border-radius:6px;text-decoration:none;">← Kembali</a>
        <a href="{{ route('trainings.edit', $training->id) }}" style="background-color:#3e2723;color:white;padding:8px 14px;border-radius:6px;text-decoration:none;">Edit Data</a>
    </div>
</div>
@endsection