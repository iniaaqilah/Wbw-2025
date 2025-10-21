@extends('master')
@section('title', 'Detail Gaji Pegawai')

@section('content')
<div style="background-color:#f2e3d5; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); max-width:800px; margin:auto;">
    <h2 style="color:#3e2723;">Detail Gaji Pegawai</h2>
    <table style="width:100%; border-collapse:collapse; margin-top:15px;">
        <tr style="background-color:#4e342e; color:white;">
            <th style="text-align:left; padding:10px; width:30%;">Field</th>
            <th style="text-align:left; padding:10px;">Data</th>
        </tr>
        <tr>
            <td style="padding:10px;">Nama Pegawai</td>
            <td style="padding:10px;">{{ $salary->employee->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Bulan</td>
            <td style="padding:10px;">{{ ucfirst($salary->bulan) }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Gaji Pokok</td>
            <td style="padding:10px;">Rp{{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Tunjangan</td>
            <td style="padding:10px;">Rp{{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Potongan</td>
            <td style="padding:10px;">Rp{{ number_format($salary->potongan, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="padding:10px;">Total Gaji</td>
            <td style="padding:10px; color:#2e7d32; font-weight:bold;">
                Rp{{ number_format($salary->total_gaji, 2, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td style="padding:10px;">Dibuat</td>
            <td style="padding:10px;">{{ $salary->created_at->format('d M Y H:i') }}</td>
        </tr>
    </table>

    <div style="margin-top:20px;">
        <a href="{{ route('salaries.index') }}" style="background-color:#8d6e63;color:white;padding:8px 14px;border-radius:6px;text-decoration:none;">← Kembali</a>
        <a href="{{ route('salaries.edit', $salary->id) }}" style="background-color:#3e2723;color:white;padding:8px 14px;border-radius:6px;text-decoration:none;">Edit Data</a>
    </div>
</div>
@endsection
