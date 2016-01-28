<?php

class Draft extends Eloquent {

	protected $fillable = array('creator_id', 'send_to_id', 'subject', 'time');
	public $timestamps = false;

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'drafts';


}
