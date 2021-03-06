<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('production_unit_id');
            $table->string('item');
            $table->string('quantity');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->foreign('production_unit_id')->references('id')->on('production_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_equipments');
    }
}
