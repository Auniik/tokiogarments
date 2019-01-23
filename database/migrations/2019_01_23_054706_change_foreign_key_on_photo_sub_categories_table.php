<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignKeyOnPhotoSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_sub_categories', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Drop foreign key 'user_id' from 'posts'
            $table->foreign('category_id')->references('id')->on('photo_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_sub_categories', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('photo_categories');
        });
    }
}
