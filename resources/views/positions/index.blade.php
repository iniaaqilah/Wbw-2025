@extends('master')

@section('title', 'Daftar Jabatan')

@section('content')
<div class="list-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0; color:#4E342E;">Daftar Jabatan</h1>
        <a href="{{ route('positions.create') }}" class="btn">+ Tambah Jabatan</a>
    </div>

    <form action="{{ route('positions.index') }}" method="GET" style="margin-bottom: 15px; display:inline-block;">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari jabatan..." style="width: 200px; padding: 8px;">
        <button type="submit" class="btn small">Cari</button>
        @if(request('q'))
            <a href="{{ route('positions.index') }}" class="btn small secondary">Reset</a>
        @endif
    </form>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">#</th>
                <th>Nama Jabatan</th>
                <th style="width: 150px;">Gaji Pokok</th>
                <th style="width: 150px;">Dibuat</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($positions as $pos)
            <tr>
                <td style="text-align: center;">{{ $positions->firstItem() + $loop->index }}</td>
                <td>{{ $pos->nama_jabatan }}</td>
                <td>Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}</td>
                <td>{{ $pos->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('positions.show', $pos->id) }}" class="btn small secondary">Detail</a>
                    <a href="{{ route('positions.edit', $pos->id) }}" class="btn small">Edit</a>

                    <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn small danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center;">Belum ada data jabatan.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top: 15px; text-align: center;">
        {{ $positions->links() }}
    </div>
</div>
@endsection