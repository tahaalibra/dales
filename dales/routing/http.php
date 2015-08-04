<?php namespace dales\routing;

class http
{
    public static function url()
    {
        $url      = str_ireplace(FOLDER, "", $_SERVER["REQUEST_URI"]);
        $urlArray = explode("?", $url);

        if (count($urlArray) > 1) {

            $getArray = explode("&", $urlArray[1]);

//            if(!REWRITE_AVAILABLE){
//                if(isset($getArray[0])&&!empty($getArray[0]))
//                $no_rewite = array_shift($getArray);
//                else {
//                    return '';
//                }
//            }

            if(isset($getArray[0])&&!empty($getArray[0])) {
                for ($i = 0; $i < count($getArray); $i++) {
                    @ list($k, $v) = explode('=', $getArray[$i]);
                    $_GET[$k]      = $v;
                }
            }

            if(isset($no_rewite)) {
                return trim($no_rewite);
            }
        }

        $url = $urlArray[0];
        $url = ltrim($url, '/');
        $url = rtrim($url, '/');
        return $url;
    }


}