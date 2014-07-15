<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogueItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogue_item', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->string('location')->nullable();
			$table->string('image_url')->default('')->nullable();
			$table->string('thumb_url')->default('')->nullable();
			$table->decimal('geo_lon', 9, 6)->default(null)->nullable();
			$table->decimal('geo_lat', 9, 6)->default(null)->nullable();
			$table->boolean('active')->default(false);
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
		Schema::drop('catalogue_item');
	}

}