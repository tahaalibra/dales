<?php namespace dales\kernel;

use dales\routing\Routing;

class Kernel
{

    public function boot()
    {
        require_once DALES . DS ."kernel" . DS . "helpers.php";


///////////////////////////////////////////////////////////////////////////////
//    Perform Checks
///////////////////////////////////////////////////////////////////////////////


        setReporting();
        removeMagicQuotes();
        unregisterGlobals();
        httpsonly();


///////////////////////////////////////////////////////////////////////////////
//    Start Routing
///////////////////////////////////////////////////////////////////////////////

        $routing  = new \dales\routing\Routing;
        if( $routing->routes ){
            //start session
            \dales\system\auth\Session::startSession();
            $routing->controller();
        }else {
            \dales\error\error::page("404");
        }
    }
}