<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'task';

    public function supplier(){
        return $this->belongsTo('Supplier');
    }

	//	0: not set, 1: Confirm, 2: Decline, 3:Propose
	public static $STATUS_NOTSET = 0;
	public static $STATUS_CONFIRM = 1;
	public static $STATUS_DECLINE = 2;
	public static $STATUS_PROPOSE = 3;

	public static $PAY_BY_CREDIT = 0;
	public static $PAY_BY_CRASH = 1;


	public static $table_name = 'task';

}