<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGolonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golongan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gol_yang_berlaku')->nullable();
            $table->string('periode_mulai_berlaku')->nullable();
            $table->string('kode_gol')->nullable();
            $table->string('golongan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('uraian')->nullable();
            $table->integer('administrasi')->nullable()->unsigned()->default(0);
            $table->integer('pemeliharaan')->nullable()->unsigned()->default(0);
            $table->integer('pelayanan')->nullable()->unsigned()->default(0);
            $table->integer('retribusi')->nullable()->unsigned()->default(0);
            $table->integer('denda_pakai_0')->nullable()->unsigned()->default(0);
            $table->integer('denda_tunggakan')->nullable()->unsigned()->default(0);
            $table->integer('denda_tunggakan_2')->nullable()->unsigned()->default(0);
            $table->integer('denda_tunggakan_3')->nullable()->unsigned()->default(0);
            $table->integer('denda_tunggakan_4')->nullable()->unsigned()->default(0);
            $table->integer('denda_tunggakan_per_bulan')->nullable()->unsigned()->default(0);
            $table->integer('air_limbah')->nullable()->unsigned()->default(0);
            $table->integer('min_pakai')->nullable()->unsigned()->default(0);
            $table->integer('ppn')->nullable()->unsigned()->default(0);
            $table->integer('bb1')->nullable()->unsigned()->default(0);
            $table->integer('ba1')->nullable()->unsigned()->default(0);
            $table->integer('bb2')->nullable()->unsigned()->default(0);
            $table->integer('ba2')->nullable()->unsigned()->default(0);
            $table->integer('bb3')->nullable()->unsigned()->default(0);
            $table->integer('ba3')->nullable()->unsigned()->default(0);
            $table->integer('bb4')->nullable()->unsigned()->default(0);
            $table->integer('ba4')->nullable()->unsigned()->default(0);
            $table->integer('bb5')->nullable()->unsigned()->default(0);
            $table->integer('ba5')->nullable()->unsigned()->default(0);
            $table->integer('t1')->nullable()->unsigned()->default(0);
            $table->integer('t2')->nullable()->unsigned()->default(0);
            $table->integer('t3')->nullable()->unsigned()->default(0);
            $table->integer('t4')->nullable()->unsigned()->default(0);
            $table->integer('t5')->nullable()->unsigned()->default(0);
            $table->integer('t1_tetap')->nullable()->unsigned()->default(0);
            $table->integer('t2_tetap')->nullable()->unsigned()->default(0);
            $table->integer('t3_tetap')->nullable()->unsigned()->default(0);
            $table->integer('t4_tetap')->nullable()->unsigned()->default(0);
            $table->integer('t5_tetap')->nullable()->unsigned()->default(0);
            $table->string('nomor_ba')->nullable();
            $table->boolean('aktif')->nullable()->unsigned()->default(1);
            $table->integer('retribusi_pakai')->nullable()->unsigned()->default(0);
            $table->integer('min_denda')->nullable()->unsigned()->default(0);
            $table->integer('trf_denda_berdasarkan_persen')->nullable()->unsigned()->default(0);
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
        Schema::dropIfExists('golongan');
    }
}
