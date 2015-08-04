<?php namespace dales\error;

class Fire
{
    /**
     * @param null $message
     * @param null $error
     */
    public static function set($message = null, $error = null)
    {
        echo $message;
        echo '<br>'.$error;
    }

    public static function send()
    {
        echo $message;
        echo '<br>'.$error;
    }

}
