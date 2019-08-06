<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sliders', function (Blueprint $table) {
        $table->Increments('id');
        $table->unsignedInteger('article_id')->nullable();
        $table->foreign('article_id')->references('id')->on('articles');
        $table->string('name')->nullable();
        $table->string('slider_type')->nullable();
        $table->text('content')->nullable();
        $table->string('miniature')->nullable();
        $table->string('picture')->nullable();
        $table->string('link')->nullable();
        $table->integer('position')->default(0);
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
        Schema::dropIfExists('sliders');
    }
}
