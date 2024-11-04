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
        Schema::table('penduduk_distrik', function (Blueprint $table) {
            $table->integer('jumlah_produktif')->after('jumlah')->default(0);
            $table->integer('jumlah_pengangguran')->after('jumlah_produktif')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduk_distrik', function (Blueprint $table) {
            //
        });
    }
};
