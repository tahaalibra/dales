<?php namespace app\controller\home;

class HomeController
{
  public function home()
  {
      view("home");
  }

  public function test($abcd=null, $klm=null)
  {
      echo "test";
      echo $abcd;
      echo $klm;
  }
}
