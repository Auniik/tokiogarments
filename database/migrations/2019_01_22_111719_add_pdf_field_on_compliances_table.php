<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPdfFieldOnCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compliances', function (Blueprint $table) {
            $table->text('pdf_document')->nullable();
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
            $table->dropColumn('pdf_document')->nullable();
        });
    }
}
