@extends('master')

@section('title', 'Detail Jabatan')

@section('content')
<h2>Detail Jabatan</h2>

<table>
    <tr><th>ID</th><td>{{ $position->id }}</td></tr>
    <tr><th>Nama Jabatan</th><td>{{ $position->nama_jabatan }}</td></tr>
    <tr><th>Gaji Pokok</th><td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td></tr>
    <tr><th>Dibuat</th><td>{{ $position->created_at }}</td></tr>
</table>

<a href="{{ route('positions.index') }}" class="btn">Kembali</a>
<a href="{{ route('positions.edit', $position->id) }}" class="btn">Edit</a>
@endsection
