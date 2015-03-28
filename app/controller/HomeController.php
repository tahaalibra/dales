<?php namespace app\controller;

use dales\core\controller;

class HomeController extends Controller
{
  public function home()
  {
      $this->doNotRenderHeader=1;
      $model = new $this->model;
      echo "yo";
  }

  public function abcd()
  {
    $this->doNotRenderHeader=1;
    echo "Hey Bro";
  }

}
