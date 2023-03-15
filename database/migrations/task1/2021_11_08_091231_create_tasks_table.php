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
		if (!Schema::hasTable('tasks')) {
			Schema::create('tasks', function (Blueprint $table) {
				$table->id();
				$table->string('name');
				$table->timestamps();
			});
		}

		Schema::table('tasks', function (Blueprint $table) {
			$table->foreignId('user_id')->constrained();
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
