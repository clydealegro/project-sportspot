<?php
	
	/*
	 * Created on Feb 13, 2007
	 *
	 * created by marc
	 * custom encryption
	 * 
	 */
	 
	 require_once("Class.blowfish.php");
	 
	 class Crypt{
	 	
	 	private $strKey = "JK39089FJK300MSDF9KLSDF0376KLDF8";
	 		 	
 	 	function __construct(){
	 		return $this; 
	 	}
	 	
	 	function setKey($key){
	 		$this->strKey = $key;
	 	}
	 	
	 	function getKey(){
	 		return $this->strKey;
	 	}
	 	
	 	/**
		 * String padding
		 *
		 * @param   string  input string
		 * @param   integer length of the result
		 * @param   string  the filling string
		 * @param   integer padding mode
		 *
		 * @return  string  the padded string
		 *
		 * @access  public
		 */
		function full_str_pad($input, $pad_length, $pad_string = '', $pad_type = 0) {
		    $str = '';
		    $length = $pad_length - strlen($input);
		    if ($length > 0) { // str_repeat doesn't like negatives
		        if ($pad_type == STR_PAD_RIGHT) { // STR_PAD_RIGHT == 1
		            $str = $input.str_repeat($pad_string, $length);
		        } elseif ($pad_type == STR_PAD_BOTH) { // STR_PAD_BOTH == 2
		            $str = str_repeat($pad_string, floor($length/2));
		            $str .= $input;
		            $str .= str_repeat($pad_string, ceil($length/2));
		        } else { // defaults to STR_PAD_LEFT == 0
		            $str = str_repeat($pad_string, $length).$input;
		        }
		    } else { // if $length is negative or zero we don't need to do anything
		        $str = $input;
		    }
		    return $str;
		}
	 	
	 	/**
		 * Encryption using blowfish algorithm
		 *
		 * @param   string  original data
		 * @param   string  the secret
		 *
		 * @return  string  the encrypted result
		 *
		 * @access  public
		 *
		 * @author  lem9
		 */
		function PMA_blowfish_encrypt($data) {
		    $pma_cipher = new Horde_Cipher_blowfish;
		    $encrypt = '';
		    for ($i=0; $i<strlen($data); $i+=8) {
		        $block = substr($data, $i, 8);
		        if (strlen($block) < 8) {
		            $block = $this->full_str_pad($block,8,"\0", 1);
		        }
		        $encrypt .= $pma_cipher->encryptBlock($block, $this->strKey);
		    }
		    return base64_encode($encrypt);
		}
		
		/**
		 * Decryption using blowfish algorithm
		 *
		 * @param   string  encrypted data
		 * @param   string  the secret
		 *
		 * @return  string  original data
		 *
		 * @access  public
		 *
		 * @author  lem9
		 */
		function PMA_blowfish_decrypt($encdata) {
		    $pma_cipher = new Horde_Cipher_blowfish;
		    $decrypt = '';
		    $data = base64_decode($encdata);
		    for ($i=0; $i<strlen($data); $i+=8) {
		        $decrypt .= $pma_cipher->decryptBlock(substr($data, $i, 8), $this->strKey);
		    }
		    return trim($decrypt);
		}

		function encrypt($decryptString){
	 		return $this->PMA_blowfish_encrypt(trim($decryptString));
	 	}
	 	
	 	function decrypt($decryptString){
	 		return $this->PMA_blowfish_decrypt(trim($decryptString));
	 	}
	 	
	 }
	 
?>
