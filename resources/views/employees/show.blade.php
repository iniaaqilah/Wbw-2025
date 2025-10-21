<!DOCTYPE html>
<html>
<head>
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body { padding-top: 20px; background-color: #f8f9fa; }
        .card { max-width: 600px; margin: auto; }
        dt { font-weight: bold; }
        dd { margin-bottom: 0.5rem; }
    </style>
</head>
<body>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0">Detail Pegawai: {{ $employee->nama_lengkap }}</h1>
            <a href="{{ route('employees.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">ID Pegawai</dt>
                <dd class="col-sm-8">{{ $employee->id }}</dd>

                <dt class="col-sm-4">Nama Lengkap</dt>
                <dd class="col-sm-8">{{ $employee->nama_lengkap }}</dd>

                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">{{ $employee->email }}</dd>

                <dt class="col-sm-4">Nomor Telepon</dt>
                <dd class="col-sm-8">{{ $employee->nomor_telepon }}</dd>

                <dt class="col-sm-4">Tanggal Lahir</dt>
                <dd class="col-sm-8">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</dd>

                <dt class="col-sm-4">Alamat</dt>
                <dd class="col-sm-8">{{ $employee->alamat }}</dd>

                <dt class="col-sm-4">Tanggal Masuk</dt>
                <dd class="col-sm-8">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</dd>

                <dt class="col-sm-4">Status</dt>
                <dd class="col-sm-8">
                     <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($employee->status) }}
                    </span>
                </dd>

                <dt class="col-sm-4">Departemen</dt>
                <dd class="col-sm-8">{{ optional($employee->departement)->nama_departemen ?? 'N/A' }}</dd>

                <dt class="col-sm-4">Jabatan</dt>
                <dd class="col-sm-8">{{ optional($employee->position)->nama_jabatan ?? 'N/A' }}</dd>

                <dt class="col-sm-4">Dibuat Pada</dt>
                <dd class="col-sm-8">{{ $employee->created_at->format('d F Y H:i:s') }}</dd>

                <dt class="col-sm-4">Diperbarui Pada</dt>
                <dd class="col-sm-8">{{ $employee->updated_at->format('d F Y H:i:s') }}</dd>
            </dl>
        </div>
    </div>
</div>
</body>
</html>