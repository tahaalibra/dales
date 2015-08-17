<?php namespace app\controller;

use dales\controller\Controller;

class IndexController extends Controller
{

  public function index()
  {
      return view('index',array('title' => 'Welcome'));
  }



}
