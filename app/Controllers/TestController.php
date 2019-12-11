<?php
/**
 * User: Heropoo
 * Date: 2019/1/16
 * Time: 12:01
 */

namespace App\Controllers;


use Moon\Controller;
use Moon\Db\Connection;

class TestController extends Controller
{
    public function index(){
        //return 'test';
        echo \Moon::environment();
        dd(\Moon::$app);
    }

    public function db(){
        /** @var Connection $db */
        $db = \Moon::$app->get('db');
        //dd($db);
        dump($db->fetchAll('show full columns from {{user}}'));
    }
}