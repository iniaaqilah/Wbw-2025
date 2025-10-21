@extends('master')
@section('title', 'Data Gaji Pegawai')

@section('content')
<div class="container mt-5" style="background-color:#d8c096; padding:20px; border-radius:12px;">
    <h1>Daftar Gaji Pegawai</h1>
    <a href="{{ route('salaries.create') }}" style="background-color:#3e2723;color:white;padding:10px 16px;text-decoration:none;border-radius:8px;">+ Tambah Data Gaji</a>
    <br><br>

    <table style="width:100%;border-collapse:collapse;background:white;border-radius:10px;overflow:hidden;">
        <thead style="background-color:#4e342e;color:white;">
            <tr>
                <th style="padding:10px;">No</th>
                <th style="padding:10px;">Nama Pegawai</th>
                <th style="padding:10px;">Bulan</th>
                <th style="padding:10px;">Gaji Pokok</th>
                <th style="padding:10px;">Tunjangan</th>
                <th style="padding:10px;">Potongan</th>
                <th style="padding:10px;">Total Gaji</th>
                <th style="padding:10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($salaries as $index => $salary)
                <tr style="text-align:center;border-bottom:1px solid #ddd;">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $salary->bulan }}</td>
                    <td>Rp{{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                    <td>Rp{{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                    <td>Rp{{ number_format($salary->potongan, 2, ',', '.') }}</td>
                    <td><strong>Rp{{ number_format($salary->total_gaji, 2, ',', '.') }}</strong></td>
                    <td>
                        <a href="{{ route('salaries.edit', $salary->id) }}" style="background-color:#8d6e63;color:white;padding:5px 10px;border-radius:6px;text-decoration:none;">Edit</a>
                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data gaji ini?')" style="background-color:#6d4c41;color:white;padding:5px 10px;border:none;border-radius:6px;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" style="padding:12px;text-align:center;">Belum ada data gaji.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
