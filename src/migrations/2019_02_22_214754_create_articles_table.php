<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('articles', function (Blueprint $table) {
        $table->Increments('id');
        $table->unsignedInteger('category_id')->nullable();
        $table->foreign('category_id')->references('id')->on('categories');
        $table->string('name');
        $table->string('slug')->unique();
        $table->date('date')->nullable();
        $table->string('description', 255)->nullable();
        $table->longtext('content')->nullable();
        $table->boolean('highlight')->nullable();
        $table->string('picture')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
