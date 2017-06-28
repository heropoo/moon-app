<?php
namespace app\controllers;

use app\models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Moon\App;
use Moon\Controller;

/**
 * Created by PhpStorm.
 * User: yy
 * Date: 17-3-8
 * Time: 上午12:29
 */
class IndexController extends Controller
{
    public function index(Request $request){
        return $this->render('index/index', ['name'=>$request->get('name', 'LitLara')]);
    }
}