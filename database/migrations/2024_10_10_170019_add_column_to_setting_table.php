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
        Schema::table('settting', function (Blueprint $table) {
            $table->string('nama_kadis')->after('id');
            $table->text('sambutan_kadis')->nullable();
            $table->string('struktur_dinas')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('foto_dinas')->nullable();
            $table->string('email_dinas')->default('dinas@gmail.com');
            $table->text('google_maps')->nullable();
            $table->string('telp')->default(0);
            $table->string('fax')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting', function (Blueprint $table) {
            //
        });
    }
};
