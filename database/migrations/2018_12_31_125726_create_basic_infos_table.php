<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('title',100);
            $table->string('phone',30);
            $table->string('email',50);
            $table->text('meta_discription');
            $table->text('keywords');
            $table->string('slogan',100);
            $table->string('address',250);
            $table->text('location');
            $table->string('facebook_page',200);
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
        Schema::dropIfExists('basic_infos');
    }
}
