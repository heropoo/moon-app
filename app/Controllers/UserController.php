<?php
/**
 * User: Heropoo
 * Date: 2018/7/12
 * Time: 23:40
 */

namespace App\Controllers;

class UserController
{
    public function login()
    {
        return 'login';
    }

    public function post_login()
    {

    }

    public function logout()
    {
        return redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function post_register()
    {

    }
}