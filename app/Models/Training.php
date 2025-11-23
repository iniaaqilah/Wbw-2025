<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'karyawan_id', 
        'nama_pelatihan', 
        'penyelenggara', 
        'tanggal_mulai', 
        'tanggal_selesai', 
        'sertifikasi_no', 
        'catatan'
    ];

    /**
     * Relasi: Satu pelatihan dimiliki oleh satu Employee.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id'); 
    }
}