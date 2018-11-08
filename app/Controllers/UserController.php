<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/7/12
 * Time: 23:40
 */

namespace App\Controllers;

use Moon\Controller;

class UserController extends Controller
{
    public function login(){
        return $this->render('login');
    }

    public function post_login(){

    }

    public function logout(){
        return redirect('login');
    }

    public function register(){
        return $this->render('register');
    }

    public function post_register(){

    }
}