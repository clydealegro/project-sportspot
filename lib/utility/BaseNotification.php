<?php

class BaseNotification
{
	private $mailer = null;

	public function __construct()
	{
		$this->mailer = sfContext::getInstance()->getMailer();
	}

	public function send($messageBody, $subject, $to = array(), $from = array(), $messageType = 'text/html'){
		try {
			// Create the mailer and message objects
			$message = Swift_Message::newInstance();
			$message->setSubject($subject);
			$message->setBody($messageBody, $messageType);
			$message->setFrom($from);
			$message->setTo($to);

			$this->mailer->send($message);
		}
		catch (Exception $e){
			echo '<pre>';
			echo $e->__toString(); exit;
		}
	}

	public function getAdminEmail()
	{
		return 'info@uyaag.com';
	}
}