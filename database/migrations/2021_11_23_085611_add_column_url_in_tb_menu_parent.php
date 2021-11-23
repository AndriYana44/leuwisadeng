<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUrlInTbMenuParent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_menu_parent', function (Blueprint $table) {
            $table->string('url')->nullable()->after('urutan');
            $table->boolean('is_single')->default(0)->after('url');
            $table->bigInteger('id_halaman')->after('is_single');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_menu_parent', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->dropColumn('is_single');
            $table->dropColumn('id_halaman');
        });
    }
}
