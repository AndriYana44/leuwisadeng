<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->timestamps();
        });

        Schema::table('tb_posting', function(Blueprint $table) {
            $table->bigInteger('id_kategori')->after('judul');
            $table->dropColumn('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kategori');

        Schema::table('tb_posting', function(Blueprint $table) {
            $table->string('kategori')->after('judul');
            $table->dropColumn('id_kategori');
        });
    }
}
