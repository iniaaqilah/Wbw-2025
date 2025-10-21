<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'departemen_id',
        'jabatan_id',
    ];

    // relasi ke departement
    public function departement()
    {
        return $this->belongsTo(\App\Models\Departement::class, 'departemen_id');
    }

    // relasi ke position
    public function position()
    {
        return $this->belongsTo(\App\Models\Position::class, 'jabatan_id');
    }
}
