<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kabupaten')->constrained('kabupaten')->onDelete('cascade');
            $table->foreignId('id_status_perusahaan')->constrained('status_perusahaan')->onDelete('cascade');
            $table->foreignId('id_skala_objek_pengawasan')->constrained('skala_objek_pengawasan')->onDelete('cascade');
            $table->foreignId('id_kepemilikan_perusahaan')->constrained('kepemilikan_perusahaan')->onDelete('cascade');
            $table->foreignId('id_status_modal')->constrained('status_modal')->onDelete('cascade');
            $table->string('kode_wlkp')->default(0);
            $table->string('nama_perusahaan');
            $table->string('slug');
            $table->text('alamat_perusahaan');
            $table->string('telp_perusahaan')->default('+62');
            $table->string('kbli')->default('-');
            $table->date('tanggal_pendaftaran');
            $table->string('email_perusahaan')->unique();
            $table->string('no_tdp')->default(0);
            $table->string('no_akta')->default(0);
            $table->string('nama_pemilik');
            $table->text('alamat_pemilik');
            $table->string('nama_pengurus');
            $table->text('alamat_pengurus');
            $table->integer('jumlah_karyawan_laki')->default(0);
            $table->integer('jumlah_karyawan_perempuan')->default(0);
            $table->integer('jumlah_tka')->default(0);
            $table->integer('jumlah_tkl')->default(0);
            $table->integer('jumlah_oap')->default(0);
            //mk = masih bekerja
            $table->integer('jumlah_mk_laki')->default(0);
            $table->integer('jumlah_mk_perempuan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
};
