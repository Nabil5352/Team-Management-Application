<?php

class Task extends Eloquent {

	protected $fillable = array('assigned_to', 'assigned_by', 'project_id', 'title', 'description', 'start_date', 'end_date', 'task_created_at', 'completed');
	public $timestamps = false;

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';
}