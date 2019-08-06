<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('locations', function (Blueprint $table) {
        $table->Increments('id');
        $table->string('name')->nullable();
        $table->string('latitude')->default(0);
        $table->string('longitude')->default(0);
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->string('location_type')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
