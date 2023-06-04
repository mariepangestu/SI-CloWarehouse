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
        Schema::create('produksis', function (Blueprint $table) {
            $table->id('id_produksi');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_biaya_produksi');
            $table->string('jumlah_produksi');
            $table->date('tgl_produksi');
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade');
            $table->foreign('id_biaya_produksi')->references('id_biaya_produksi')->on('biaya_produksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produksis');
    }
};
