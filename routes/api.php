<?php
/**
 * @var \Moon\Routing\Router $router
 */

use Symfony\Component\HttpFoundation\JsonResponse;

$router->get('{aid}/user/list', function ($aid) {
    return new JsonResponse(['code' => 0, 'msg' => 'ok', 'data' => ['aid' => $aid]]);
});