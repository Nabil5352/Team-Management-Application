<?php

class File extends Eloquent {

	protected $fillable = array('title', 'summary', 'file_name', 'file_size', 'extension', 'uploader_id', 'team_id', 'time');
	public $timestamps = false;

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'files';


}
