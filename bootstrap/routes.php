<?php
namespace Moon;

use app\controllers\IndexController;
use \Symfony\Component\HttpFoundation\JsonResponse;

/**
 * routes
 * User: yy
 * Date: 17-3-8
 * Time: 上午12:56
 */
Route::get('/', IndexController::class.'::index');

Route::get('/hello/{name}', IndexController::class.'::index');
