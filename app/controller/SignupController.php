<?php namespace app\controller;

use app\model\SignupModel;

class SignupController 
{

  public function index()
  {
      if( isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']) ){
      		  if(strlen($_POST['username'])<5||strlen($_POST['password'])<5)
            {
                if(strlen($_POST['username'])<5){
                    $message = '<div class="alert alert-danger" role="alert"> Username Length Should be greater than 5</div>';
                }
                if(strlen($_POST['password'])<5){
                    if(isset($message)) {
                      $message =  $message.'<div class="alert alert-danger" role="alert"> Password Length Should be greater than 5</div>';
                    } else {
                      $message =  '<div class="alert alert-danger" role="alert"> Password Length Should be greater than 5</div>';
                    }
                }     

            }else{

          	    $model = new SignupModel;
          	    if($model->attempSignup($_POST['username'],$_POST['password'])){
                    $message = '<div class="alert alert-success" role="alert"> User Created Succesfully</div>';

                }else{
                    $message = '<div class="alert alert-danger" role="alert"> User Already Present</div>';
                }
            }
            
            return view('signup',array('title' => 'Signup', 'message' => $message));

      }

      return view('signup',array('title' => 'Signup'));
  }



}
