<?php namespace app\model;

use dales\model\Model;

class SignupModel extends Model
{
	function attempSignup($username, $password)
	{
		$stmt = $this->dbconnect->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username");
		$stmt->execute(array('username' => $username));
		$stmt->execute();
		$count = $stmt->fetchColumn();
		
		if($count==0){

			$stmt = $this->dbconnect->prepare("INSERT INTO `users`( `username`, `password`) VALUES(:username, :password)");
			$stmt->execute(array('username' => $username, 'password' => $password));
			return "User Created Successfully";

		}else{
			return "User Already Present";
		}
	}
}