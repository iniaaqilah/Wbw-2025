@extends('master')
@section('title', 'Data Pelatihan Pegawai')

@section('content')
<div class="container mt-5" style="background-color:#f6d8bd; padding:20px; border-radius:12px;">
    <h1>Daftar Pelatihan Pegawai</h1>
    <a href="{{ route('trainings.create') }}" style="background-color:#3e2723;color:white;padding:10px 16px;text-decoration:none;border-radius:8px;">+ Tambah Data Pelatihan</a>
    <br><br>

    @if(session('success'))
       
    @endif

    <table style="width:100%;border-collapse:collapse;background:white;border-radius:10px;overflow:hidden;">
        <thead style="background-color:#4e342e;color:white;">
            <tr>
                <th style="padding:10px;">No</th>
                <th style="padding:10px;">Nama Pegawai</th>
                <th style="padding:10px;">Pelatihan</th>
                <th style="padding:10px;">Penyelenggara</th>
                <th style="padding:10px;">Periode</th>
                <th style="padding:10px;">Sertifikasi No.</th>
                <th style="padding:10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trainings as $index => $training)
                <tr style="text-align:center;border-bottom:1px solid #ddd;">
                    <td>{{ $trainings->firstItem() + $index }}</td>
                    <td>{{ $training->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $training->nama_pelatihan }}</td>
                    <td>{{ $training->penyelenggara ?? '-' }}</td>
                    <td>{{ $training->tanggal_mulai }} s/d {{ $training->tanggal_selesai ?? 'Selesai' }}</td>
                    <td>{{ $training->sertifikasi_no ?? '-' }}</td>
                    <td>
                        <a href="{{ route('trainings.show', $training->id) }}" style="background-color:#514040;color:white;padding:5px 10px;border-radius:6px;text-decoration:none;">Detail</a>
                        <a href="{{ route('trainings.edit', $training->id) }}" style="background-color:#8d6e63;color:white;padding:5px 10px;border-radius:6px;text-decoration:none;">Edit</a>
                        <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data pelatihan ini?')" style="background-color:#6d4c41;color:white;padding:5px 10px;border:none;border-radius:6px;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="padding:12px;text-align:center;">Belum ada data pelatihan.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:20px; text-align:center;">
        {{ $trainings->links() }}
    </div>
</div>
@endsection