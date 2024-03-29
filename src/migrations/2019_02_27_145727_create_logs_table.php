<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('logs', function (Blueprint $table) {
        $table->Increments('id');
        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        $table->string('action')->nullable();
        $table->string('location')->nullable();
        $table->text('userdata')->nullable();
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
        Schema::dropIfExists('logs');
    }
}
