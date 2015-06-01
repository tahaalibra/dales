<?php namespace dales\error;

class Error
{
    /**
     * @param null $message
     * @param null $error
     */
    public static function send($message = null, $error = null)
    {
        echo $message;
        echo '<br>'.$error;
    }

}
