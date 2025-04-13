<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCompaniesTable extends Migration {
    /**
     * Run the migrations.
     *
     */
    public function up() {
        // TASK: add a migration to rename table "company" into "companies"
        Schema::rename('company', 'companies');
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down() {
        // TASK: add a migration to rename table "companies" into "company"
        Schema::rename('companies', 'company');
    }
}
