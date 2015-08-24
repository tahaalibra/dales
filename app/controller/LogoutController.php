<?php namespace app\controller;

use dales\system\Auth\Session;

class LogoutController
{

	public function index()
	{
		Session::destroySession();
		header('Location: index');
	}

}