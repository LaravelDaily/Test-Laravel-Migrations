<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RenameNameInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            // Check if the column "title" exists before renaming
        //                 $table->renameColumn('title', 'name'); doesn't work
            DB::statement('ALTER TABLE companies CHANGE title name VARCHAR(255)');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            // Revert the changes if needed
            $table->renameColumn('name', 'title');
        });
    }
}
