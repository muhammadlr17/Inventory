<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->timestamps();   
            $table->string('nama');
            $table->string('kode', 10);
            $table->string('kondisi');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_ruang');
            $table->foreign('id_ruang')
                ->on('ruang')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}
