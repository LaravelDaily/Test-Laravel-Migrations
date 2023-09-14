<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
//            Issue:
//            $table->bigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
//            FIRST way:
//            $table->bigInteger('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('users');
//            SECOND way:
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');

//            BEST way for me:
            $table->foreignId('user_id')->constrained();

            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
