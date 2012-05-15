<?php


class TokenGenerator
{
	public function __construct()
	{
		return $this;
	}

	public function getToken($id,$type)
	{
		$key = md5(uniqid().time());
		$token = 'id='.$id.'&type='.$type.'&key='.$key;

		$crypt = new Crypt();
		$token = $crypt->encrypt($token);

		return urlencode($token); 
	}

	public function parseToken($token)
	{
    $crypt = new Crypt();
    $param = urldecode($crypt->decrypt($token));

    $tempParam = array_unique(explode('&',$param));
    $params = array();

    foreach($tempParam as $t){
      $temp = explode('=',$t);
      $params[$temp[0]] = $temp[1];
    }

    return $params;
	}
}