<?php


function routing()
{
  $url = str_ireplace(FOLDER, "", $_SERVER["REQUEST_URI"]);
  $url = ltrim($url,'/');


      $urlArray      = array();
      $urlArray      = explode("?", $url);

      //define $_GET variables
          if(count($urlArray)>1){
              $getArray = explode("&", $urlArray[1]);
                  if($getArray[0]!=''){
                          for($i=0;$i<count($getArray);$i++){
                              @ list($k, $v) = explode('=', $getArray[$i]);
                              $_GET[$k]      = $v;
                      }
                  }
          }


      $urlArray      = explode("/", $urlArray[0]);
      $Controller    = '';
      $Action        = '';
      $Extend_Action = array();

      if (sizeof($urlArray) > 0){
          $Controller    = $urlArray[0];
      }


      if (sizeof($urlArray) > 1) {
          array_shift($urlArray);
          $Action = $urlArray[0];
      }

      if (sizeof($urlArray) > 1) {
          array_shift($urlArray);
          $Extend_Action = $urlArray;
      }


      if ($Controller == '') {
          $Controller = 'Home';
      }
      if ($Action == '') {
          $Action = $Controller;
      }


      $Controller     = rtrim(ucfirst($Controller));
      $Model          = $Controller;
      $Model         .= 'Model';
      $PassController = $Controller;
      $Controller    .= "Controller";
      $Controller     = "app\\controller\\".$Controller;
      $Model          = "app\\model\\".$Model;

      try {
          if ((int) method_exists($Controller, $Action)) {
              $reflection = new ReflectionMethod($Controller, $Action);
              if ($reflection->isPublic()){
                  $page = new $Controller($PassController, $Action, $Extend_Action, $Model);
                  call_user_func_array(array($page, $Action), $Extend_Action);
              }else{
                  //$page = new Error_404Controller();
                  echo "not found";
              }
          } else {
              //$page = new Error_404Controller();
              echo "not found";
          }
      } catch (Exception $e) {
          //echo $e->getMessage();
          echo "not found";
      }


}
