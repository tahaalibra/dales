<?php

///////////////////////////////////////////////////////////////////////////////////////////////////
// Map of Dales - Paths Configuration
///////////////////////////////////////////////////////////////////////////////////////////////////


define('FOLDER'    , str_ireplace($_SERVER["DOCUMENT_ROOT"]."","", str_replace(DS,'/',WWW)));
define('BP'        , "http://".$_SERVER['HTTP_HOST'].''.FOLDER.'/');
define('CONTROLLER', ROOT.DS.'app'.DS.'controller');
define('MODEL'     , ROOT.DS.'app'.DS.'model');
define('VIEW'      , ROOT.DS.'app'.DS.'view');
define('DALES'     , ROOT.DS.'dales');
define('APP'       , ROOT.DS.'app');

