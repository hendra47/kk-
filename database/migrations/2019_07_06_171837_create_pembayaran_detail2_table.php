<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranDetail2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_detail2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_pembayaran');
            $table->integer('id_obat');
            $table->string('nama_obat');
            $table->integer('qty');
            $table->integer('harga');
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
        Schema::dropIfExists('pembayaran_detail2');
    }
}
