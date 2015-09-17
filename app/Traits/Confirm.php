<?php

namespace App;

use App\ConfirmationServiceProvider;
use App\Http\Requests\Request;
use Illuminate\Auth\Passwords\DatabaseTokenRepository;
use Illuminate\Support\Str;

/**
 * Interface confirmable sendEmail();
 */
Use Confirmable;
/**
 * Class confirm to create a basic confirmation object
 */
abstract class Confirm extends DatabaseTokenRepository
{	
	/**
	 * This is the default template to send emails.
	 */
	const DEFAULT_VIEW = 'email/default';

	/**
	 * this is the default subject of the email.
	 */
	const DEFAULT_SUBJECT = 'default-subject';

	public $subject;
	public $email_view;
	public $user;
	public $callback;
	public $link;
	protected $token;
	protected $data;


	/**
	 * Here we set the data to compose the final object
	 */
	function __construct($user)
	{	
		$this->user = $user;
		$this->subject = $this->setSubject($this->customSubject);
		$this->token = $this->setToken();
		$this->callback = $this->setCallBack();
		$this->email_view = $this->setView($this->customView);
		$this->link = $this->generateLink($this->customView, $this->token);
		$this->data = $this->setData();
		$this->sendEmail($this->data);	
	}

	/**
	 * Set the data that will be send.
	 * @return array
	 */
	public function setData()
	{
		return $data = array(
			'link' => $this->link, 
			'email' => $this->user,
			'view' => $this->email_view,
			'subject' => $this->subject,
			'token' => $this->token
			);
	}

	/**
	 * Set the subject of the e-mail and put a default
	 * subject if it doesn't exists.
	 * @param @subject: string
	 * @return sttring 
	 */
	public function setSubject($subject)
	{
		return ($subject ? $this->subject = $subject : Confirm::DEFAULT_SUBJECT);
	}

	/**
	 * Here we encrit the word confirmation in order
	 * to create a token to send to the user
	 * @return string
	 */
	private function setToken()
	{
		return $this->token = hash_hmac('sha256', Str::random(40), '3810daj39a99zze3f9');
	}

	/**
	 * Create the link that will be send.
	 * @param @view: string
	 * @param @token: string
	 * @return string
	 */
	private function generateLink($view, $token)
	{	

		$view = url($this->customView);

		return $this->link = $view.'/'.$this->token;
	}
	/**
	 * Set the view that will be used.
	 * @return string
	 */
	public function setView($view)
	{
		$this->email_view = $this->checkView($view);
		$this->email_view  = str_replace('/','.', $this->email_view);

		return $this->email_view;
	}

	/**
	 * Set the callback
	 * @return string
	 */
	public function setCallBack()
	{
		return $this->callback = 'callback';
	}

	/**
	 * Check the if the given view exist or put the default
	 * @return string
	 */
	public function checkView($view)
	{
		$checkView = view()->exists($view);

		switch ($checkView){
			case true:
				return $view;
			default:
				return Confirm::DEFAULT_VIEW;
		}		
	}


}