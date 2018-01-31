<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        // Set FK di Kolom category_id di table post
        // Schema::table('posts', function(Blueprint $table) {
        //     $table->foreign('category_id')
        //             ->references('id')
        //             ->on('categories')
        //             ->onDelete('cascade')
        //             ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop FK dikolom category_id di table posts
        // Schema::table('posts', function(Blueprint $table) {
        //     $table->dropForeign('posts_category_id_foreign');
        // });

        Schema::dropIfExists('categories');
    }
}
