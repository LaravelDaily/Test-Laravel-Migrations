<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

            // TASK: Add soft deletes column here
            // When the record is deleted, instead of removing it from the record
            // time when its deleted is safe in the 'deleted_at' column
            // and the actual record is still in the database
            // but we can't retrieve it anymore, except with "withTrasned()" or "onlyTrashed()" query methods.
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
