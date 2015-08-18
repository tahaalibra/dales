<?php
use dales\routing\Routes;

Routes::set('/','IndexController@index');
Routes::set('home','IndexController@index');
Routes::set('login','LoginController@index');
Routes::set('signup','SignupController@index');




