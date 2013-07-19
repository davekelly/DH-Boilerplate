<?php

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
			$table->text('location');
			$table->string('image_url')->default('');
			$table->string('thumb_url')->default('');
			$table->decimal('geo_lon', 9, 6);
			$table->decimal('geo_lat', 9, 6);
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