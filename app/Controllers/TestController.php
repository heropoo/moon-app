<?php
/**
 * User: Heropoo
 * Date: 2019/1/16
 * Time: 12:01
 */

namespace App\Controllers;

use Moon\Db\Connection;
use Moon\Routing\Router;
use SuperClosure\Serializer;

class TestController
{
    public function indexAction()
    {
        return \Moon::environment();
    }

    public function dbAction()
    {
        /** @var Connection $db */
        $db = \Moon::$container->get('db');
        //dd($db);
        dump($db->fetchAll('show full columns from {{user}}'));
    }

    public function sAction()
    {
        $serializer = new Serializer();

        /** @var Router $router */
        $router = \Moon::$container->get('router');

        echo '<pre>';
//        var_dump($router->getRoutes());
        $route = $router->getRoutes()->get('user.list');
        var_dump($route);
        $serialized = $serializer->serialize($route->getAction());
        echo $serialized;

        $unserialized = $serializer->unserialize($serialized);

        $response = $unserialized('v1', 100);
        $response->send();
    }

    public function requestAction()
    {
        echo request()->getPathInfo();
        echo '<br>';
        echo request()->getMethod();
    }
}