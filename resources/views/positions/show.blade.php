@extends('master')

@section('title', 'Detail Jabatan')

@section('content')
<div class="content-wrapper" style="max-width:600px; margin:auto;">
    <h2 style="color:#4E342E;">Detail Jabatan</h2>

    <table class="detail-table">
        <tr>
            <th>ID</th>
            <td>{{ $position->id }}</td>
        </tr>
        <tr>
            <th>Nama Jabatan</th>
            <td>{{ $position->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $position->created_at->format('d F Y H:i:s') }}</td>
        </tr>
        <tr>
            <th>Diperbarui Pada</th>
            <td>{{ $position->updated_at->format('d F Y H:i:s') }}</td>
        </tr>
    </table>

    <div style="margin-top: 20px;">
        <a href="{{ route('positions.index') }}" class="btn secondary">← Kembali</a>
        <a href="{{ route('positions.edit', $position->id) }}" class="btn">Edit Data</a>
    </div>
</div>
@endsection