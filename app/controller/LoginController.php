<?php namespace app\controller;

use app\services\auth\Auth;

class LoginController 
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
          	    if(Auth::attemptLogin($_POST['username'],$_POST['password'])){
                    
          	    	header('Location: home');

                }else{
                    $message = '<div class="alert alert-danger" role="alert"> Username or Password Do Not Match</div>';
                }
            }
            
            return view('login',array('title' => 'Login', 'message' => $message));

      }

      return view('login',array('title' => 'Login'));
  }

}
