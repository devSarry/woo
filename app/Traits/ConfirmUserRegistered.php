<?php

Use App\Confirm;
/**
* 
*/
class ConfirmUserRegistered extends Confirm
{
	var $customView = 'emails/confirm';
	var $customSubject = 'Confirm User plz';

	public function __construct($user)
	{	
		parent::__construct($user);
	}

	public function sendEmail($data)
	{	
		$simple = new SimpleConfirmation;
		$simple->sendEmail($this->data);	
	}
	
}