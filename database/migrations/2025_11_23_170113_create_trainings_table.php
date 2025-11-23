<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     * Metode up() digunakan saat Anda menjalankan 'php artisan migrate'
     */
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            
            // Kolom ID Utama
            $table->id(); // Membuat kolom 'id' sebagai Primary Key (BIGINT AUTO_INCREMENT)

            // Kolom Foreign Key (Wajib)
            $table->unsignedBigInteger('karyawan_id'); 
            // Kolom untuk menyimpan ID Pegawai, tipe data harus sama dengan Primary Key di tabel 'employees'

            // Kolom Data Pelatihan
            $table->string('nama_pelatihan', 150); // Menyimpan nama pelatihan (Maks 150 karakter)
            $table->string('penyelenggara', 100)->nullable(); // Siapa yang menyelenggarakan (Boleh kosong/NULL)
            $table->date('tanggal_mulai'); // Tanggal mulai pelatihan (Wajib diisi)
            $table->date('tanggal_selesai')->nullable(); // Tanggal selesai pelatihan (Boleh kosong/NULL)
            $table->string('sertifikasi_no', 50)->nullable()->unique(); 
            // Nomor sertifikat (Boleh kosong/NULL, tapi jika diisi harus UNIK/tidak boleh sama dengan data lain)
            $table->text('catatan')->nullable(); // Catatan tambahan (Boleh kosong/NULL)

            // ----------------------------------------------------
            // DEKLARASI FOREIGN KEY
            // ----------------------------------------------------
            $table->foreign('karyawan_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
            /*
             * Penjelasan: 
             * 1. 'karyawan_id' adalah kolom FK di tabel 'trainings' ini.
             * 2. Merujuk ke kolom 'id'
             * 3. Di tabel 'employees'.
             * 4. Jika data Employee dihapus, semua data Pelatihan terkait juga ikut terhapus (CASCADE).
             */
            
            // Kolom Timestamp
            $table->timestamps(); // Membuat dua kolom otomatis: 'created_at' dan 'updated_at'
        });
    }

    /**
     * Balikkan (rollback) migrasi.
     * Metode down() digunakan saat Anda menjalankan 'php artisan migrate:rollback'
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings'); // Menghapus tabel 'trainings' jika rollback
    }
};