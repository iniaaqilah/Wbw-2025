@extends('master')
@section('title', 'Daftar Pegawai')

@section('content')
<div class="container" style="background-color:#f6d8bd; padding:20px; border-radius:12px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Daftar Pegawai</h1>
        <a href="{{ route('employees.create') }}" style="background-color:#3e2723;color:white;padding:10px 16px;text-decoration:none;border-radius:8px;">
            + Tambah Pegawai Baru
        </a>
    </div>

    <table style="width:100%;border-collapse:collapse;background:white;border-radius:10px;overflow:hidden;">
        <thead style="background-color:#4e342e;color:white;">
            <tr>
                <th style="padding:10px;">No</th>
                <th style="padding:10px;">Nama Lengkap</th>
                <th style="padding:10px;">Email</th>
                <th style="padding:10px;">Departemen</th>
                <th style="padding:10px;">Jabatan</th>
                <th style="padding:10px;">Status</th>
                <th style="padding:10px;" width="200px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $index => $employee)
            <tr style="text-align:center;border-bottom:1px solid #ddd;">
                <td>{{ $employees->firstItem() + $index }}</td>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ optional($employee->departement)->nama_departemen ?? 'N/A' }}</td>
                <td>{{ optional($employee->position)->nama_jabatan ?? 'N/A' }}</td>
                <td>
                    <span style="padding:4px 8px; border-radius:4px; color:white; background-color: {{ $employee->status == 'aktif' ? '#28a745' : '#6c757d' }}">
                        {{ ucfirst($employee->status) }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display:inline;">
                        <a href="{{ route('employees.show', $employee->id) }}" style="background-color:#514040;color:white;padding:5px 10px;border-radius:6px;text-decoration:none;">Detail</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" style="background-color:#8d6e63;color:white;padding:5px 10px;border-radius:6px;text-decoration:none;">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color:#dc3545;color:white;padding:5px 10px;border:none;border-radius:6px;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="padding:12px;text-align:center;">Belum ada data pegawai.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:20px; text-align:center;">
        {!! $employees->links() !!}
    </div>
</div>
@endsection