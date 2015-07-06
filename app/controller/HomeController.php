<?php namespace app\controller;

use app\model\HomeModel;

class HomeController
{
  public function home()
  {
      $page = "signin";
      return view($page,array('page'=>$page));
  }

  public function test()
  {
    echo "test";
  }
}
