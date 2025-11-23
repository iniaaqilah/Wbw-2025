@extends('master')

@section('title', 'Edit Jabatan')

@section('content')
<div class="content-wrapper" style="max-width:500px; margin:auto;">
    <h2 style="color:#4E342E;">Edit Jabatan</h2>

    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Jabatan</label>
        <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}" maxlength="100" required>

        <label>Gaji Pokok (angka)</label>
        <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}" step="0.01" min="0" required>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('positions.index') }}" class="btn secondary">Batal</a>
        </div>
    </form>
</div>
@endsection