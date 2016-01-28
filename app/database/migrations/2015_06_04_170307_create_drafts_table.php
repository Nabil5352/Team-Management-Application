<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drafts', function($table){
			$table->integer('id',true);
			$table->integer('creator_id');
			$table->integer('send_to_id');
			$table->string('subject');
			$table->string('message');
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
		Schema::drop('drafts');
	}

}
