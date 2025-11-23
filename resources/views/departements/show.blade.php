@extends('master')

@section('title', 'Detail Departemen')

@section('content')
<div class="content-wrapper" style="max-width:500px; margin:auto;">
    <h2 style="color:#4E342E;">Detail Departemen</h2>

    <table class="detail-table">
        <tr>
            <th>ID</th>
            <td>{{ $departement->id }}</td>
        </tr>
        <tr>
            <th>Nama Departemen</th>
            <td>{{ $departement->nama_departemen }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $departement->created_at->format('d F Y H:i:s') }}</td>
        </tr>
        <tr>
            <th>Diperbarui Pada</th>
            <td>{{ $departement->updated_at->format('d F Y H:i:s') }}</td>
        </tr>
    </table>

    <div style="margin-top:20px;">
        <a href="{{ route('departements.index') }}" class="btn secondary">← Kembali</a>
        <a href="{{ route('departements.edit', $departement->id) }}" class="btn secondary">Edit Data</a>
    </div>
</div>
@endsection