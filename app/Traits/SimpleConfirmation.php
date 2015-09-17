<?php

use Illuminate\Support\Facades\Mail;

/**
* 
*/
class SimpleConfirmation implements Confirmable
{
	/**
     * Send an e-mail to confirm the user.
     *
     * @param  Request  $request
     * @param  array  $id
     * @return Response
     */
	var $email;
	var $subject;
	
	public function sendEmail($data)
	{	
		//$subject = $data['subject'];
		//dd($data);

		$this->email = $data['email'];
		$this->subject = $data['subject'];
		$send = Mail::send($data['view'], ['data' => $data], function ($message) {
			$message->from(Config::get('mail.from.address'), Config::get('global.app-name'));
			$message->to($this->email);
			$message->subject($this->subject);
		});

		if ($send)
			return 'email sent';

		return 'error'; 
		//echo 'look im preparing a simple email with this '.var_dump($data['email']).'<br>';	
	}


}