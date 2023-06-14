<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('src');
			$table->unsignedInteger('girl_id');
            $table->timestamps();
			$table->foreign('girl_id')->references('id')->on('girls');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo');
    }
}
