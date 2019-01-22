<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsTypeInCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compliances', function (Blueprint $table) {
            $table->string('homage');
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
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
            $table->dropColumn('homage');
            $table->string('title')->change();
            $table->text('description')->change();
        });
    }
}
