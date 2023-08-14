<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameNameInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TASK: write the migration to rename the column "title" into "name"
        Schema::table('companies', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
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
            $table->renameColumn('name', 'title');
        });
    }
}
