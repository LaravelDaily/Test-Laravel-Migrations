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
		if (!Schema::hasTable('comments')) {
			Schema::create('comments', function (Blueprint $table) {
				$table->id();
				$table->string('comment_text');
				$table->timestamps();
			});
		}

		Schema::table('comments', function (Blueprint $table) {
			$table->foreignId('user_id')->constrained();
			$table->foreignId('comment_id')->constrained();
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
