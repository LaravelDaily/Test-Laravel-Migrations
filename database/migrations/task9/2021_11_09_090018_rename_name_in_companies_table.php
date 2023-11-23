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
        Schema::whenTableHasColumn('companies', 'title', function(Blueprint $table){
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
        Schema::whenTableHasColumn('title', 'companies', function(Blueprint $table){
            $table->renameColumn('name', 'title');
        });
    }
}
