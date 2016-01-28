<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function($table){
			$table->integer('id', true);
			$table->integer('assigned_to');
			$table->integer('assigned_by');
			$table->string('project_id');
			$table->string('title');
			$table->string('description');
			$table->date('start_date');
			$table->date('end_date');
			$table->time('task_created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
