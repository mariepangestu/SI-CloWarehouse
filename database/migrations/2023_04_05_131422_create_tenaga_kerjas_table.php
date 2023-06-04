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
        Schema::create('tenaga_kerjas', function (Blueprint $table) {
            $table->id('id_tenaga_kerja');
            $table->string('nama_tenaga_kerja');
            $table->enum('jenis_kelamin',['Perempuan','Laki-Laki'])->nullable();
            $table->string('usia');
            $table->string('gaji_tenaga_kerja');
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
        Schema::dropIfExists('tenaga_kerjas');
    }
};
