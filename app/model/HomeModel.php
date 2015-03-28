<?php namespace app\model;

use dales\core\model;

class HomeModel extends Model
{
  public function home()
  {
      $this->render=0;
      $model = new $this->model;
      echo "yo";
  }
}
