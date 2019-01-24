<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesInPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('name',50)->after('id');
            $table->text('pdf_document')->nullable()->after('description');
            $table->text('description')->nullable()->change();
            $table->string('title',192)->change();
            $table->renameColumn('url','slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('pdf_document')->nullable();
            $table->text('description')->nullable(false)->change();
            $table->string('title',50)->change();
            $table->renameColumn('slug','url');
        });
    }
}
