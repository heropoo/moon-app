<?php
/**
 * User: Heropoo
 * Date: 2018/1/11
 * Time: 22:11
 */
namespace App\Controllers;

use Moon\Controller;

class IndexController extends Controller
{
    public function index(){
        $_SESSION['page'] = request()->getUri();
        return $this->render('hello');
    }
}