<?php
use dales\routing\Routes;

Routes::set('/','IndexController@index');
Routes::set('index','IndexController@index');
Routes::set('logout','LogoutController@index');
Routes::set('home','HomeController@index');
Routes::set('login','LoginController@index');
Routes::set('signup','SignupController@index');




