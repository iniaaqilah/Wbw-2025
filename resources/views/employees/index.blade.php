<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body { padding-top: 20px; background-color: #d0b489; }
        .table thead th { background-color: #4e2e1c; color: white; }
        .btn-action { margin-right: 5px; }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Daftar Pegawai</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary" style="background-color: #51433c;">
            <i class="fas fa-plus me-1"></i> Tambah Pegawai Baru
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Departemen</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th width="280px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $index => $employee)
                        <tr>
                            <td>{{ $employees->firstItem() + $index }}</td>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ optional($employee->departement)->nama_departemen ?? 'N/A' }}</td>
                            <td>{{ optional($employee->position)->nama_jabatan ?? 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <a class="btn btn-info btn-sm btn-action" href="{{ route('employees.show', $employee->id) }}" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm btn-action" href="{{ route('employees.edit', $employee->id) }}" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-action" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data pegawai.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>