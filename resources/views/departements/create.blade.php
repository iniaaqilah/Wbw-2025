@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
    <h2>Tambah Departemen</h2>

    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departements.store') }}" method="POST">
        @csrf
        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" value="{{ old('nama_departemen') }}" maxlength="100" required>
        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection
