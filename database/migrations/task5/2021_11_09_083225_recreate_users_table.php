<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TASK: add an if-statement in this file to NOT create table if it already exists
        if(!Schema::hasTable('users')){
            $table->id();
            Schema::create('users', function (Blueprint $table) {
                $table->string('name');
                    $table->id();
                $table->string('email')->unique();
                    $table->string('name');
                $table->timestamp('email_verified_at')->nullable();
                    $table->string('email')->unique();
                $table->string('password');
                    $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
                    $table->string('password');
                $table->timestamps();
                    $table->rememberToken();
            });
                $table->timestamps();
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
        //
    }
}
