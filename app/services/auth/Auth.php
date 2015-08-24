<?php namespace app\services\auth;

use dales\model\Model;
use dales\system\encryption\Encryption;
use PDO;

class Auth
{

    function __constructor()
    {
        $this->table = null;
        $this->username = null;
        $this->password = null;

        $table           = null;
        $usernameColumn  = null;
        $passwordCoulmn  = null;
    }

    public static function attemptLogin($username, $password)
    {
          

        $model           = new Model;
        $stmt            = $model->dbconnect->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(array('username' => $username));
        $row             = $stmt->fetch(PDO::FETCH_ASSOC);
        $model           = null;
        if ($stmt->rowCount() == 1) {
                if (Encryption::verify($row["password"],$password)) {
                    $_user_browser            = $_SERVER['HTTP_USER_AGENT'];
                    $_SESSION['id']      = $row["id"];
                    $_SESSION['username']     = $username;
                    $passwordhash             = $row["password"];
                    $_SESSION['login_string'] = hash('sha512', $passwordhash.$_user_browser);
                    return 1;
                } else {
                    return 0;
                }

        } else {
            return 0;
        }
    }

    public static function checkLogin()
    {   
        if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['login_string'])) {

            $username        = $_SESSION['username'];
            $model           = new Model;
            $stmt            = $model->dbconnect->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->execute(array('username' => $username));
            $row             = $stmt->fetch(PDO::FETCH_ASSOC);
            $model= null;
            if ($stmt->rowCount() == 1) {

                $passwordhash    = $row["password"];
                $user_browser   = $_SERVER['HTTP_USER_AGENT'];

                if ($_SESSION['login_string'] == hash('sha512', $passwordhash.$user_browser)&&$_SESSION['id']==$row['id']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

}
