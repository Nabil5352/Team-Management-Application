<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function($table){
			$table->integer('id',true);
			$table->string('title');
			$table->string('summary');
			$table->string('file_name');
			$table->integer('file_size');
			$table->string('extension');
			$table->integer('uploader_id');
			$table->integer('team_id');
			$table->dateTime('time');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('files');
	}

}
