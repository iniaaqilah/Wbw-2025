@extends('master')

@section('title', 'Daftar Jabatan')

@section('content')
<h1>Daftar Jabatan</h1>

<div style="margin-bottom:12px;">
    <a href="{{ route('positions.create') }}" class="btn">Tambah Jabatan</a>

    <form action="{{ route('positions.index') }}" method="GET" style="display:inline-block; margin-left:20px;">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari jabatan..." />
        <button type="submit" class="btn">Cari</button>
        @if(request('q'))
            <a href="{{ route('positions.index') }}" class="btn">Reset</a>
        @endif
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($positions as $pos)
            <tr>
                <td>{{ $positions->firstItem() + $loop->index }}</td>
                <td>{{ $pos->nama_jabatan }}</td>
                <td>Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}</td>
                <td>{{ $pos->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('positions.show', $pos->id) }}" class="btn small">Detail</a>
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
                <td colspan="5">Belum ada data jabatan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $positions->links() }}
@endsection
