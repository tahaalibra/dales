<?php namespace dales\kernel;

use dales\routing\Routing;

class Kernel
{

    public function boot()
    {
        require_once DALES . DS ."kernel" . DS . "loader.php";
        require_once DALES . DS ."kernel" . DS . "checks.php";
        $routing  = new \dales\routing\Routing;
        if( $routing->routes ){
            \dales\system\Auth\Auth::startSession();
            $routing->controller();
        }else {
            \dales\error\error::send("404 Page Not Found");
        }
    }
}