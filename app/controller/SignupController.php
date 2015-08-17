<?php namespace app\controller;

use app\model\SignupModel;

class SignupController 
{

  public function index()
  {
      if( isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']) ){
      		//try create entry if not then display error
      	    $model = new SignupModel;
      	    echo $model->attempSignup($_POST['username'],$_POST['password']);
      }

      return view('signup',array('title' => 'Signup'));
  }



}
