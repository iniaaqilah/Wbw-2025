@extends('master')

@section('title', 'Detail Departemen')

@section('content')
    <h2>Detail Departemen</h2>

    <table>
        <tr><th>ID</th><td>{{ $departement->id }}</td></tr>
        <tr><th>Nama</th><td>{{ $departement->nama_departemen }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $departement->created_at }}</td></tr>
    </table>

    <a href="{{ route('departements.index') }}" class="btn">Kembali</a>
@endsection
