@extends('master')

@section('title', 'Daftar Departemen')

@section('content')
    <h1>Daftar Departemen</h1>
    <a href="{{ route('departements.create') }}" class="btn">Tambah Departemen</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Departemen</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departements as $index => $d)
            <tr>
                <td>{{ $departements->firstItem() + $index }}</td>
                <td>{{ $d->nama_departemen }}</td>
                <td>{{ $d->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('departements.show', $d->id) }}" class="btn small">Detail</a>
                    <a href="{{ route('departements.edit', $d->id) }}" class="btn small">Edit</a>
                    <form action="{{ route('departements.destroy', $d->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn small danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $departements->links() }}
@endsection
