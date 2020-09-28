<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailorders', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_makanan');
            $table->string('nama_pembeli');
            $table->string('nama_menu');
            $table->string('harga');
            $table->enum('status',['ready','soldout']);
            $table->string('jumlah_beli');
            $table->string('total_harga');
            $table->string('pembayaran');
            $table->string('kembalian');
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
        Schema::dropIfExists('detailorders');
    }
}
