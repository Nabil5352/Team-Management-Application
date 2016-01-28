<?php

class Milestone extends Eloquent {

	protected $fillable = array('project_id', 'subject', 'summary', 'date', 'created_at');
	public $timestamps = false;

	public function projects()
    {
        return $this->belongsTo('Project');
    }
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'milestones';


}
