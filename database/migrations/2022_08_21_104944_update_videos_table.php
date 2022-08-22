<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            // crate column with modifiers
            $table->unsignedBigInteger('category_id')
                  ->nullable()
                  ->after('id');
            // define forignKey
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // To not get an error if you roll back 
        Schema::table('videos', function (Blueprint $table) {
            // 1) drop the raltion (my table many + _ + my olumn of fn name + foreign)
            $table->dropForeign('videos_category_id_foreign');
            // 2) drop the column 
            $table->dropColumn('category_id');
        });
    }
}
