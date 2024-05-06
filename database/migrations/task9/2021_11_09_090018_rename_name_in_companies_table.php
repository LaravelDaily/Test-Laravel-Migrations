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
        // Without doctrine/dbal $table->renameColumn didn't work, so we need todo the following trick seen somewhere else
        Schema::table('companies', function (Blueprint $table) {
            $table->string('name')->after('title')->nullable();
        });

        DB::table('companies')->update([
            'name' => DB::raw('title'),
        ]);

        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('title');
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
