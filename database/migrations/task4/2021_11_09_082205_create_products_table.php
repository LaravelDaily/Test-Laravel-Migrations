<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TASK: Edit this file, so that deleting category would auto-delete its products
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Foreign key that references category table id
            // without onDelete, it is an integrity constraint violation.
            $table->foreignId('category_id')
                ->constrained()
                ->onDelete("cascade"); // Add an ondelete action
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
        Schema::dropIfExists('products');
    }
}
