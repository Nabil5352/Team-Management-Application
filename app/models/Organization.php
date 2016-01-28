<?php

class Organization extends Eloquent {

	protected $fillable = array('org_title', 'org_email' 'creator_id');
	public $timestamps = false;

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'organizations';


}
