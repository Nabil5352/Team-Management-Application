<?php

class Project extends Eloquent {

	protected $fillable = array('project_title', 'project_desc', 'team_id', 'strat_date', 'end_date');
	public $timestamps = false;

	public function teams()
    {
        return $this->belongsTo('Team');
    }

    public function milestones()
    {
        return $this->hasMany('Milestone');
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';


}
