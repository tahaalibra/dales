<?php namespace app\controller;

use app\services\auth\Auth;

class HomeController
{

	public function index()
	{
		if(Auth::checkLogin()){
			echo "Logged In";
			echo '<br> <a href="logout"> Logout </a>';
		}else{
			echo "Logged Out";
		}
	}

}