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
        Schema::create('renstra', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->string('file');
            $table->integer('jmlh_download')->default(0);
            $table->integer('jmlh_view')->default(0);
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
        Schema::dropIfExists('renstra');
    }
};
