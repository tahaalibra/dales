<?php namespace app\controller\home;

class HomeController
{
  public function home()
  {
      echo "aksh";
  }

  public function test($abcd=null, $klm=null)
  {
      echo "test";
      echo $abcd;
      echo $klm;
  }
}
