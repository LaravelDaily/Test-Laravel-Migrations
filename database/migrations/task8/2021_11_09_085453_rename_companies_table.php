<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // TASK: add a migration to rename table "company" into "companies"
        if (Schema::hasTable('company')) {
            Schema::rename('company', 'companies');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (Schema::hasTable('companies')) {
            Schema::rename('companies', 'company');
        }
    }
};
