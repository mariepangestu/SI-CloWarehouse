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
        Schema::create('stok_produksis', function (Blueprint $table) {
            $table->id('id_stok_produksi');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_gudang');
            $table->string('jumlah_stok');
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_produksis');
    }
};
