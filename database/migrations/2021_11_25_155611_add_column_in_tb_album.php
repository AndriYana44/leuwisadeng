<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTbAlbum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_album', function (Blueprint $table) {
            $table->string('album')->after('id');
        });

        Schema::table('tb_foto', function (Blueprint $table) {
            $table->string('judul')->after('id');
            $table->string('foto')->after('judul');
            $table->bigInteger('id_album')->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_album', function (Blueprint $table) {
            $table->dropColumn('album');
        });

        Schema::table('tb_foto', function (Blueprint $table) {
            $table->dropColumn('judul');
            $table->dropColumn('foto');
            $table->dropColumn('id_album');
        });
    }
}
