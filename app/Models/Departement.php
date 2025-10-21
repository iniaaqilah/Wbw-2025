<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    // jika tabel bernama 'departements' sesuai migration, tetapkan eksplisit:
    protected $table = 'departements';

    protected $fillable = [
        'nama_departemen',
    ];
}
