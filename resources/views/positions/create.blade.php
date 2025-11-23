@extends('master')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="content-wrapper" style="max-width:500px; margin:auto;">
    <h2 style="color:#4E342E;">Tambah Jabatan</h2>

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
        {{-- Menggunakan input type number dengan step untuk konsistensi --}}
        <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok') }}" step="0.01" min="0" required>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('positions.index') }}" class="btn secondary">Batal</a>
        </div>
    </form>
</div>
@endsection