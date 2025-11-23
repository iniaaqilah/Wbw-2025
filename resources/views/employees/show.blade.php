@extends('master')
@section('title', 'Detail Pegawai')

@section('content')
<div style="background-color:#f2e3d5; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); max-width:800px; margin:auto;">
    <h2 style="color:#3e2723;">Detail Pegawai: {{ $employee->nama_lengkap }}</h2>
    
    <table style="width:100%; border-collapse:collapse; margin-top:15px;">
        <tr style="background-color:#4e342e; color:white;">
            <th style="text-align:left; padding:10px; width:30%;">Field</th>
            <th style="text-align:left; padding:10px;">Data</th>
        </tr>
        <tr>
            <td style="padding:10px;">ID Pegawai</td>
            <td style="padding:10px;">{{ $employee->id }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Nama Lengkap</td>
            <td style="padding:10px;">{{ $employee->nama_lengkap }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Email</td>
            <td style="padding:10px;">{{ $employee->email }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Nomor Telepon</td>
            <td style="padding:10px;">{{ $employee->nomor_telepon }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Tanggal Lahir</td>
            <td style="padding:10px;">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Alamat</td>
            <td style="padding:10px; white-space: pre-wrap;">{{ $employee->alamat }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Tanggal Masuk</td>
            <td style="padding:10px;">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Status</td>
            <td style="padding:10px;">
                <span style="padding:4px 8px; border-radius:4px; color:white; background-color: {{ $employee->status == 'aktif' ? '#28a745' : '#6c757d' }}">
                    {{ ucfirst($employee->status) }}
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding:10px;">Departemen</td>
            <td style="padding:10px;">{{ optional($employee->departement)->nama_departemen ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Jabatan</td>
            <td style="padding:10px;">{{ optional($employee->position)->nama_jabatan ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Dibuat Pada</td>
            <td style="padding:10px;">{{ $employee->created_at->format('d F Y H:i:s') }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Diperbarui Pada</td>
            <td style="padding:10px;">{{ $employee->updated_at->format('d F Y H:i:s') }}</td>
        </tr>
    </table>

    <div style="margin-top:20px;">
        <a href="{{ route('employees.index') }}" style="background-color:#8d6e63;color:white;padding:8px 14px;border-radius:6px;text-decoration:none;">← Kembali</a>
        <a href="{{ route('employees.edit', $employee->id) }}" style="background-color:#3e2723;color:white;padding:8px 14px;border-radius:6px;text-decoration:none;">Edit Data</a>
    </div>
</div>
@endsection