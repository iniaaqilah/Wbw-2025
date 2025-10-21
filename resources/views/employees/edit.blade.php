<!DOCTYPE html>
<html>
<head>
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body { padding-top: 20px; background-color: #f8f9fa; }
        .card { max-width: 700px; margin: auto; }
    </style>
</head>
<body>
<div class="container">
     <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
             <h1 class="h5 mb-0">Edit Pegawai: {{ $employee->nama_lengkap }}</h1>
            <a href="{{ route('employees.index') }}" class="btn btn-light btn-sm">
                 <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                 <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $employee->email) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                        <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required>
                    </div>
                     <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" style="height:100px" name="alamat" id="alamat" required>{{ old('alamat', $employee->alamat) }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                        <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
                    </div>
                     <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="departemen_id" class="form-label">Departemen:</label>
                        <select name="departemen_id" id="departemen_id" class="form-select" required>
                             <option value="" disabled>Pilih Departemen</option>
                            @foreach ($departements as $dept)
                                <option value="{{ $dept->id }}" {{ old('departemen_id', $employee->departemen_id) == $dept->id ? 'selected' : '' }}>{{ $dept->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jabatan_id" class="form-label">Jabatan:</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                            <option value="" disabled>Pilih Jabatan</option>
                            @foreach ($positions as $pos)
                                <option value="{{ $pos->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $pos->id ? 'selected' : '' }}>{{ $pos->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>