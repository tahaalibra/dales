<?php


function routing()
{
$route1 = "/";
$route1 = "/{test}","@home";
$route1 = "home/{test}";
$route2 = "home/{test}/{test}";
$route3 = "home/{test}","@home";

$route  = explode("/","home");
$search = preg_match_all('/{.*?}/', $input, $matches);


}
