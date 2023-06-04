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
        Schema::create('biaya_produksis', function (Blueprint $table) {
            $table->id('id_biaya_produksi');
            $table->unsignedBigInteger('id_bahanbaku');
            $table->unsignedBigInteger('id_tenaga_kerja'); 
            $table->string('total_biaya');
            $table->timestamps();

            $table->foreign('id_bahanbaku')->references('id_bahanbaku')->on('bahan_bakus')->onDelete('cascade');
            $table->foreign('id_tenaga_kerja')->references('id_tenaga_kerja')->on('tenaga_kerjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biaya_produksis');
    }
};
