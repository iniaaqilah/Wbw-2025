@extends('master')

@section('title', 'Daftar Departemen')

@section('content')
<div class="list-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Daftar Departemen</h1>
        <a href="{{ route('departements.create') }}" class="btn">+ Tambah Departemen</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">#</th>
                <th>Nama Departemen</th>
                <th style="width: 150px;">Dibuat</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($departements as $index => $d)
            <tr>
                <td style="text-align: center;">{{ $departements->firstItem() + $index }}</td>
                <td>{{ $d->nama_departemen }}</td>
                <td>{{ $d->created_at->format('Y-m-d') }}</td>
                <td>
                    {{-- TOMBOL DETAIL MENGGUNAKAN SECONDARY --}}
                    <a href="{{ route('departements.show', $d->id) }}" class="btn small secondary">Detail</a>
                    {{-- TOMBOL EDIT MENGGUNAKAN SECONDARY --}}
                    <a href="{{ route('departements.edit', $d->id) }}" class="btn small">Edit</a>
                    <form action="{{ route('departements.destroy', $d->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        {{-- TOMBOL HAPUS MENGGUNAKAN DANGER --}}
                        <button onclick="return confirm('Yakin hapus?')" class="btn small danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="padding:12px; text-align:center; background-color:white;">Belum ada data departemen.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top: 15px; text-align: center;">
        {{ $departements->links() }}
    </div>
</div>
@endsection