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
        // TASK: write the migration to rename the column "title" into "name"
        DB::statement('ALTER TABLE `companies` CHANGE `title` `name` VARCHAR(255)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `companies` CHANGE `name` `title` VARCHAR(255)');

    }
}
