<?php namespace dales\system\auth;

class Session
{
	
    public static function destroySession()
    {
        $_SESSION = array();
        $params   = session_get_cookie_params();
        setcookie(session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]);
        session_destroy();
    }


    public static function startSession()
    {
        $session_name = 'dales';   // Set a custom session name
        $secure       = false;
        $httponly     = true;
        if (ini_set('session.use_only_cookies', 1) === false) {
        } else {

            $cookieParams = session_get_cookie_params();
            session_set_cookie_params($cookieParams["lifetime"],
                $cookieParams["path"],
                $cookieParams["domain"],
                $secure,
                $httponly);
            session_name($session_name);
            session_start();
            session_regenerate_id(true);
        }
    }
}