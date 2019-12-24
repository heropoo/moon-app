<?php
/**
 * User: Heropoo
 * Date: 2019/1/16
 * Time: 12:01
 */

namespace App\Controllers;


use Moon\Controller;
use Moon\Db\Connection;
use Moon\Routing\Router;
use SuperClosure\Serializer;

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

    public function s(){
        $serializer = new Serializer();

        /** @var Router $router */
        $router = \Moon::$container->get('router');

        echo '<pre>';
//        var_dump($router->getRoutes());
        $route = $router->getRoutes()->get('GET:/api/{version:v\d+}/{aid:\d+}/user/list');
        var_dump($route);
        $serialized = $serializer->serialize($route->getAction());
        echo $serialized;

        $unserialized = $serializer->unserialize($serialized);

        $response = $unserialized('v1', 100);
        $response->send();
    }
}