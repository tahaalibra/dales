<?php namespace app\controller;

use dales\controller\Controller;

class IndexController extends Controller
{
    //use \dales\view\View;

    public function index()
    {
        return view('index');
    }

    public function result()
    {
        return view('result');
    }

    public function login($abcd)
    {
        echo $abcd;
    }



}
