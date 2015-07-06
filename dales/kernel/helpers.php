<?php

///////////////////////////////////////////////////////////////////////////////
//    Making System Calls Available For Use In Controller Model and View
///////////////////////////////////////////////////////////////////////////////

require_once APP   . DS . "config" . DS . "routes.php";
require_once DALES . DS ."kernel"  . DS . "checks.php";
require_once DALES . DS ."kernel"  . DS . 'systemcalls' . DS ."controller.php";
require_once DALES . DS ."kernel"  . DS . 'systemcalls' . DS ."model.php";
require_once DALES . DS ."kernel"  . DS . 'systemcalls' . DS ."view.php";
