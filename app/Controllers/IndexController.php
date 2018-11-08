<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/1/11
 * Time: 22:11
 */
namespace App\Controllers;

use Moon\Controller;

class IndexController extends Controller
{
    public function index(){
        return 'welcome to moon app';
    }

    public function test(){
        //return $this->render('test');
        return 'test';
    }
}