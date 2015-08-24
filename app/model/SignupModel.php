<?php namespace app\model;

use dales\model\Model;
use dales\system\encryption\Encryption;

class SignupModel extends Model
{
	function attempSignup($username, $password)
	{
		$stmt = $this->dbconnect->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username");
		$stmt->execute(array('username' => $username));
		$stmt->execute();
		$count = $stmt->fetchColumn();
		
		if($count==0){

			$password = Encryption::hash($password);
			$stmt = $this->dbconnect->prepare("INSERT INTO `users`( `username`, `password`) VALUES(:username, :password)");
			$stmt->execute(array('username' => $username, 'password' => $password));
			return 1;

		}else{
			return 0;
		}
	}
}