<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGirlsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('girls', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->integer('age');
			$table->string('country');
			$table->string('video_src');
			$table->unsignedBigInteger('category_id');
    		$table->foreign('category_id')->references('id')->on('categories');
			$table->mediumText('description');
			$table->unsignedInteger('viewCount');
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
		Schema::drop('girls');
	}
};
