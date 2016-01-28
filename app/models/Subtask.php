<?php

class Subtask extends Eloquent {

	protected $fillable = array('task_id', 'subtask_title', 'subtask_desc', 'completed');
	public $timestamps = false;

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subtasks';


}
