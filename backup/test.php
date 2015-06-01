<?php  namespace dales;

use ReflectionMethod;

class test
{
    /**
     * @param null $path
     * @param null $action
     */
    public static function path($path = null, $action = null)
    {
        $url           = str_ireplace(FOLDER, "", $_SERVER["REQUEST_URI"]);
        $urlArray      = explode("?", $url);
        if(count($urlArray)>1){
            $getArray = explode("&", $urlArray[1]);
            if($getArray[0]!=''){
                for($i=0;$i<count($getArray);$i++){
                    @ list($k, $v) = explode('=', $getArray[$i]);
                    $_GET[$k]      = $v;
                }
            }
        }

        $vars = array();
        $url  = $urlArray[0];
        $url  = ltrim($url,'/');
        $url  = rtrim($url,'/');
        $path = ltrim($path,'/');
        $path = rtrim($path,'/');

        $path = explode('/',$path);
        $url  = explode('/',$url);

        if(count($path)==count($url)) {
            for($i=0 ; $i < count($path); $i++) {
                if(preg_match("/\{(.*?)\}/",$path[$i],$match))
                {
                    $vars[$match[1]] = $url[$i];
                    $path[$i]        = $url[$i];
                }
            }
        }

        for($i=0 ; $i < count($path); $i++) {
            if(preg_match("/\{(.*?)\}/",$path[$i]))
            {
                $path[$i]        = null;
            }
        }

        $path = implode("/", $path);
        $url  = implode("/", $url);
        $path = str_ireplace("//","/",$path);
        $path = rtrim($path,'/');

        if($path==$url){

            $action     = explode('@',$action);
            $Controller = "app\\controller\\".ucfirst($action[0]).'Controller';
            $Action     = $action[1];
            if ((int) method_exists($Controller, $Action)) {
                $reflection = new \ReflectionMethod($Controller, $Action);
                if ($reflection->isPublic()){
                    $page = new $Controller(ucfirst($action[0]) , ucfirst($action[0]), "home");
                    call_user_func_array(array($page, $Action), $vars);
                }else{
                    \dales\error\error::view("404 Page Not Found");
                }
            } else {
                \dales\error\error::view("404 Page Not Found");
            }
        }else{
                \dales\error\error::view("404 Page Not Found");
        }

    }
}


