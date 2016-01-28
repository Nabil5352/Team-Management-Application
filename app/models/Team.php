<?php

class Team extends Eloquent {

	protected $fillable = array('team_title', 'leader_id', 'org_id');
	public $timestamps = false;

	public function projects()
    {
        return $this->hasMany('Project');
    }
	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';


}
