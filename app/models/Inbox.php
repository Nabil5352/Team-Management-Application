<?php

class Inbox extends Eloquent {

	protected $fillable = array('sender_id', 'receiver_id', 'unread', 'subject', 'message', 'time');
	public $timestamps = false;

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inboxes';


}
