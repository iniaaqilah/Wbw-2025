@extends('master')
@section('title', 'Tambah Pegawai Baru')

@section('content')
<div style="background-color:#d7ccc8;padding:20px;border-radius:10px; max-width: 600px; margin: auto;">
    <h2>Tambah Pegawai Baru</h2>
    
    @if ($errors->any())
        <div class="alert error">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required><br><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required><br><br>

        <label>Alamat:</label>
        <textarea name="alamat" rows="4" required>{{ old('alamat') }}</textarea><br><br>

        <label>Tanggal Masuk:</label>
        <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required><br><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select><br><br>

        <label>Departemen:</label>
        <select name="departemen_id" required>
            <option value="" disabled selected>Pilih Departemen</option>
            @foreach ($departements as $dept)
                <option value="{{ $dept->id }}" {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>{{ $dept->nama_departemen }}</option>
            @endforeach
        </select><br><br>

        <label>Jabatan:</label>
        <select name="jabatan_id" required>
            <option value="" disabled selected>Pilih Jabatan</option>
            @foreach ($positions as $pos)
                <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>{{ $pos->nama_jabatan }}</option>
            @endforeach
        </select><br><br>

        <button type="submit" style="background-color:#3e2723;color:white;padding:10px 16px;border:none;border-radius:8px;">Simpan</button>
        <a href="{{ route('employees.index') }}" style="background-color:#8d6e63;color:white;padding:10px 16px;border-radius:8px;text-decoration:none;">Kembali</a>
    </form>
</div>
@endsection