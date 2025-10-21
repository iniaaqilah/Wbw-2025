@extends('master')

@section('title', 'Edit Departemen')

@section('content')
    <h2>Edit Departemen</h2>

    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departements.update', $departement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" value="{{ old('nama_departemen', $departement->nama_departemen) }}" maxlength="100" required>
        <button type="submit" class="btn">Update</button>
    </form>
@endsection
