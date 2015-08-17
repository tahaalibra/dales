<?php namespace app\controller;


class LoginController 
{

  public function index()
  {
      return view('login',array('title' => 'Login'));
  }



}
