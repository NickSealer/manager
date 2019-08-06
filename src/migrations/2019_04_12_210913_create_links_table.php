<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('links', function (Blueprint $table) {
        $table->Increments('id');
        $table->integer('parent_id')->default(0);
        $table->string('section')->nullable();
        $table->string('name');
        $table->string('description')->nullable();
        $table->string('link')->default('/');
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
        Schema::dropIfExists('links');
    }
}
