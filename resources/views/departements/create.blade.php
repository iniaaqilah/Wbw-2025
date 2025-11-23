@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
<div class="content-wrapper" style="max-width:500px; margin:auto;">
    <h2 style="color:#4E342E;">Tambah Departemen</h2>

    {{-- Pesan error sudah ditangani oleh master.blade.php --}}

    <form action="{{ route('departements.store') }}" method="POST">
        @csrf
        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" value="{{ old('nama_departemen') }}" maxlength="100" required>
        
        <div style="margin-top: 20px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('departements.index') }}" class="btn secondary">Batal</a>
        </div>
    </form>
</div>
@endsection