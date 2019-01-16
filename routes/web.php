<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/1/11
 * Time: 22:05
 */

//Route::get('/', 'IndexController::index');
//
//Route::get('login', 'IndexController::login');
//
//Route::get('say/{something}', 'IndexController::say');

/**
 * @var \Moon\Routing\Router $router
 */
$router = Moon::$app->get('router');

$router->get('/', 'IndexController::index');
$router->get('test', 'TestController::index');
$router->get('test/db', 'TestController::db');

$router->group(['middleware'=>'App\Middleware\SessionStart'], function ($router){
    /**
     * @var \Moon\Routing\Router $router
     */
    $router->get('register', 'UserController::register');
    $router->post('register', 'UserController::post_register');
    $router->get('login', 'UserController::login');
    $router->post('login', 'UserController::post_login');
    $router->get('logout', 'UserController::logout');

    $router->group(['middleware'=>'App\Middleware\Auth'], function ($router){
        /**
         * @var \Moon\Routing\Router $router
         */

    });
});