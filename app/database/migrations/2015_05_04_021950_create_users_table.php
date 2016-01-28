<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->integer('id',true);
			$table->string('fullname');
			$table->string('password');
			$table->string('password_temp');
			$table->string('email')->unique();
			$table->string('code');
			$table->integer('active');
			$table->string('account_type');
			$table->integer('team_id');
			$table->string('image_path');
			$table->string('token');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
