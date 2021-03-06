<?php

class myUser extends sfBasicSecurityUser
{
	public function authenticate($email,$password)
	{
		$account = AccountPeer::getAccount($email,$password);
		if($account)
		{
			$status = $account->getStatus();
			if($status == 2) {
				$this->setAuthenticated(true);
				$this->setAttribute('name',$account->getFirstName());
				$this->setAttribute('account_id',$account->getAccountId());
			}
		}
	}
}
