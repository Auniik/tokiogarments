<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameFieldInCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compliances', function (Blueprint $table) {
            $table->renameColumn('discription', 'description');
            $table->text('compliance_image')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compliances', function (Blueprint $table) {
            $table->renameColumn('description', 'discription');
            $table->string('compliance_image')->change();
        });
    }
}
