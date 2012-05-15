<?php


class VerificationEmailNotification extends BaseNotification
{

	private $account = null;

	public function __construct(Account $account)
	{
		parent::__construct();

		$this->account = $account;
	}


	public function sendMail()
	{
		$tokenizer = new TokenGenerator();

		$token = $tokenizer->getToken($this->account->getAccountId(),$type="account");

		$request = sfContext::getInstance()->getRequest();
		$base = $request->getHost();

		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		sfContext::getInstance()->getConfiguration()->loadHelpers('Url');
		$url = url_for('@activate?verificationCode='.$token);

		$header = 'Email Verification';
		$greeting = 'Good day!';
		$body = "<p>You can activate your account here <a href=".$base.$url.">".$base.$url."</a></p>";

		$message = get_partial('global/notification',array('greeting'=>$greeting,'header'=>$header,'body'=>$body));

		$email = $this->account->getEmail();
		$to =  array($email);

		$from = array($this->getAdminEmail() => 'Team Uyaag');

		$this->send($message, "Email Verification", $to, $from);

		TokenPeer::insertToken($token);
	}
}