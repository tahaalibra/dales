<?php namespace app\controller;


class IndexController 
{

  public function index()
  {
      return view('index',array('title' => 'Welcome'));
  }



}
