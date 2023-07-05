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
        if(!Schema::hasTable('comments')){
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
            // $table->unsignedInteger('comment_id');
            //$table->foreign('comment_id')->references('id')->on('comments');
            //$table->foreignId('user_id')->constrained('users')->nullable();
            //$table->foreignId('comment_id')->constrained('comments')->nullable();
            $table->string('comment_text');
            $table->timestamps();
        });}

        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('comment_id')->constrained('comments');

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