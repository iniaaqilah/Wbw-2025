@extends('master')

@section('title', 'Edit Departemen')

@section('content')
<div class="content-wrapper" style="max-width:500px; margin:auto;">
    <h2 style="color:#4E342E;">Edit Departemen</h2>

    <form action="{{ route('departements.update', $departement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" value="{{ old('nama_departemen', $departement->nama_departemen) }}" maxlength="100" required>
        
        <div style="margin-top: 20px;">
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('departements.index') }}" class="btn secondary">Batal</a>
        </div>
    </form>
</div>
@endsection