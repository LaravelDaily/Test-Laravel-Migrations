<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Check if the 'name' column does not exist before adding it
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name');
            }
        });
    }

    public function down()
    {
        // No need to define rollback operations for this migration
    }
}
