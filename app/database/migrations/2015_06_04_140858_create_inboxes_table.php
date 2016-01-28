<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inboxes', function($table){
			$table->integer('id',true);
			$table->integer('sender_id');
			$table->integer('receiver_id');
			$table->integer('unread');
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
		Schema::drop('inboxes');
	}

}
