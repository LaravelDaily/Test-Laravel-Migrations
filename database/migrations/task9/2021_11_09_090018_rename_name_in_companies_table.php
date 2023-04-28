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
        if (Schema::hasTable('companies')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->rename('title','name');
            });
        }else{
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->timestamps();
            });
            Schema::table('companies', function (Blueprint $table) {
                $table->rename('title','name');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->rename('name','title');
        });
    }
}
