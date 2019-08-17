<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekamMedisDetail2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis_detail2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_rekam_medis');
            $table->integer('id_obat');
            $table->string('nama_obat');
            $table->integer('qty');
            $table->string('note');
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
        Schema::dropIfExists('rekam_medis_detail2');
    }
}
