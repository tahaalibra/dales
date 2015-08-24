<?php namespace dales\system\encryption;

class Encryption
{

	public static function hash($data)
	{
		return (crypt($data,'salt'));
	}

	public static function verify($hash, $data)
	{	
		if(crypt($data,'salt')==$hash){
			return 1;
		}else{
			return 0;
		}		
	}
	
}