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
        // Rename the column "title" to "name"
        Schema::table('companies', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
        });

        // Copy data from old column to new column
        DB::table('companies')->update(['name' => DB::raw('title')]);

        // Remove old column
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
        // Add back the old column
        Schema::table('companies', function (Blueprint $table) {
            $table->string('title')->after('id')->nullable();
        });

        // Copy data from new column to old column
        DB::table('companies')->update(['title' => DB::raw('name')]);

        // Remove new column
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
