@extends('master')
@section('title', 'Edit Data Pelatihan')

@section('content')
<div style="background-color:#d7ccc8;padding:20px;border-radius:10px;">
    <h2>Edit Data Pelatihan: {{ $training->nama_pelatihan }}</h2>
    
    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trainings.update', $training->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Pegawai:</label>
        <select name="karyawan_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ old('karyawan_id', $training->karyawan_id) == $employee->id ? 'selected' : '' }}>
                    {{ $employee->nama_lengkap }}
                </option>
            @endforeach
        </select><br><br>

        <label>Nama Pelatihan:</label>
        <input type="text" name="nama_pelatihan" value="{{ old('nama_pelatihan', $training->nama_pelatihan) }}" required><br><br>
        
        <label>Penyelenggara (Opsional):</label>
        <input type="text" name="penyelenggara" value="{{ old('penyelenggara', $training->penyelenggara) }}"><br><br>

        <label>Tanggal Mulai:</label>
        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $training->tanggal_mulai) }}" required><br><br>
        
        <label>Tanggal Selesai (Opsional):</label>
        <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $training->tanggal_selesai) }}"><br><br>
        
        <label>No. Sertifikasi (Opsional):</label>
        <input type="text" name="sertifikasi_no" value="{{ old('sertifikasi_no', $training->sertifikasi_no) }}"><br><br>
        
        <label>Catatan (Opsional):</label>
        <textarea name="catatan">{{ old('catatan', $training->catatan) }}</textarea><br><br>

        <button type="submit" style="background-color:#3e2723;color:white;padding:10px 16px;border:none;border-radius:8px;">Update</button>
        <a href="{{ route('trainings.index') }}" class="btn" style="background-color:#5d4037; color:white;">Batal</a>
    </form>
</div>
@endsection