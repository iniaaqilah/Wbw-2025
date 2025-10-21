<!DOCTYPE html>
<html>
<head>
    <title>Detail Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <style>
        body { padding-top: 20px; background-color: #f0f2f5; }
        .card { max-width: 650px; margin: auto; border: none; }
        .card-header-custom { background-color: #0dcaf0; color: #343a40; } /* Header show biru muda */
        dt { font-weight: 500; color: #6c757d; }
        dd { margin-bottom: 0.8rem; font-weight: bold; }
        .status-badge { font-size: 0.9em; padding: 0.4em 0.7em; }
    </style>
</head>
<body>
<div class="container">
     <div class="card shadow-sm">
         <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0"><i class="fas fa-user-clock me-2"></i>Detail Absensi: {{ optional($attendance->employee)->nama_lengkap }}</h1>
            <a href="{{ route('attendances.index') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="card-body p-4">
            <dl class="row">
                <dt class="col-sm-4">ID Absensi</dt>
                <dd class="col-sm-8">{{ $attendance->id }}</dd>

                <dt class="col-sm-4">Nama Karyawan</dt>
                <dd class="col-sm-8">{{ optional($attendance->employee)->nama_lengkap ?? 'N/A' }}</dd>

                <dt class="col-sm-4">Tanggal</dt>
                <dd class="col-sm-8">{{ \Carbon\Carbon::parse($attendance->tanggal)->isoFormat('dddd, D MMMM Y') }}</dd>

                <dt class="col-sm-4">Waktu Masuk</dt>
                <dd class="col-sm-8">{{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}</dd>

                <dt class="col-sm-4">Waktu Keluar</dt>
                <dd class="col-sm-8">{{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}</dd>

                <dt class="col-sm-4">Status Absensi</dt>
                <dd class="col-sm-8">
                     <span class="badge rounded-pill status-badge bg-{{ strtolower($attendance->status_absensi) == 'hadir' ? 'success' : (strtolower($attendance->status_absensi) == 'izin' ? 'warning text-dark' : (strtolower($attendance->status_absensi) == 'sakit' ? 'info text-dark' : 'danger')) }}">
                        {{ ucfirst($attendance->status_absensi) }}
                    </span>
                </dd>

                <hr class="my-3">

                <dt class="col-sm-4">Dicatat Pada</dt>
                <dd class="col-sm-8">{{ $attendance->created_at->isoFormat('D MMMM Y / HH:mm') }}</dd>

                <dt class="col-sm-4">Pembaruan Terakhir</dt>
                <dd class="col-sm-8">{{ $attendance->updated_at->isoFormat('D MMMM Y / HH:mm') }}</dd>
            </dl>
             <div class="text-end mt-4">
                 <a class="btn btn-warning btn-sm" href="{{ route('attendances.edit', $attendance->id) }}">
                    <i class="fas fa-edit me-1"></i> Edit Data Ini
                 </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>