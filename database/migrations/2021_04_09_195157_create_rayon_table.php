<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRayonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rayon', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rayon')->nullable();
            $table->string('nama_rayon')->nullable();
            $table->string('kode_area')->nullable();
            $table->string('area')->nullable();
            $table->string('kode_wil')->nullable();
            $table->string('wilayah')->nullable();
            $table->string('kode_loket')->nullable();
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
        Schema::dropIfExists('rayon');
    }
}
