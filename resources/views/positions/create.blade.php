@extends('master')

@section('title', 'Tambah Jabatan')

@section('content')
<h2>Tambah Jabatan</h2>

@if($errors->any())
    <div class="alert error">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('positions.store') }}" method="POST">
    @csrf
    <label>Nama Jabatan</label>
    <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan') }}" maxlength="100" required>

    <label>Gaji Pokok (angka)</label>
    <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok') }}" step="0.01" min="0" required>

    <button type="submit" class="btn">Simpan</button>
    <a href="{{ route('positions.index') }}" class="btn">Batal</a>
</form>
@endsection
