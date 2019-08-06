<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
        $table->Increments('id');
        $table->string('name')->nullable();
        $table->string('slug')->unique();
        $table->string('pdf_link')->nullable();
        $table->text('description')->nullable();
        $table->string('picture')->nullable();
        $table->string('product_type')->nullable();
        $table->boolean('highlight')->nullable();
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
