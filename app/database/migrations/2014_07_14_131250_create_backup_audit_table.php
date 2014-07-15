<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackupAuditTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create a table to store an audit trail of
		// database backkups
		Schema::create('backups', function($table){
			$table->increments('id');
			
			$table->integer('user_id')->nullable();
			$table->string('filename');
			$table->string('destination');
			$table->string('compression');

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
		Schema::drop('backups');
	}

}
