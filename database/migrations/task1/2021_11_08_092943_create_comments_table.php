<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
//            Issue:
//            $table->unsignedInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->unsignedInteger('comment_id');
//            $table->foreign('comment_id')->references('id')->on('comments');
//            FIRST way:
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->unsignedBigInteger('comment_id');
//            $table->foreign('comment_id')->references('id')->on('comments');
//            SECOND way:
//            $table->bigInteger('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->bigInteger('comment_id')->unsigned();
//            $table->foreign('comment_id')->references('id')->on('comments');

//            BEST way for me:
            $table->foreignId('user_id')->constrained();
            $table->foreignId('comment_id')->constrained();

            $table->string('comment_text');
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
        Schema::dropIfExists('comments');
    }
}
