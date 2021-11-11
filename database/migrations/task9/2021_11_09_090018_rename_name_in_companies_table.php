<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        // TASK: write the migration to rename the column "title" into "name"
        DB::statement("ALTER TABLE `companies` CHANGE COLUMN `title` `name` VARCHAR(255) NOT NULL;");

        Schema::table('companies', function (Blueprint $table) {

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `companies` CHANGE COLUMN `name` `title` VARCHAR(255) NOT NULL;");

        Schema::table('companies', function (Blueprint $table) {

        });
    }
}
