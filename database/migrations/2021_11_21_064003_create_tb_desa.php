<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_desa', function (Blueprint $table) {
            $table->id();
            $table->string('desa');
            $table->string('slug');
            $table->string('gambar_utama')->nullable();
            $table->string('foto_pimpinan')->nullable();
            $table->string('nama_pimpinan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->text('profil')->nullable();
            $table->text('struktur')->nullable();
            $table->text('rencana')->nullable();
            $table->text('demografi')->nullable();
            $table->text('kegiatan')->nullable();
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
        Schema::dropIfExists('tb_desa');
    }
}
