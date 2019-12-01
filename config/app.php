<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2017/6/14
 * Time: 11:49
 */

return [
    'debug' => env('APP_DEBUG', false),
    'environment' => env('APP_ENV', 'production'),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => 'Asia/Shanghai',
    'components' => [
        'db' => include __DIR__ . '/db.php',
        'redis' => [
            'class' => 'Moon\Cache\Redis',
            'host' => env('REDIS_HOST', 'localhost'),
            'port' => env('REDIS_PORT', 6379),
            'password' => env('REDIS_PASSWORD'),
            'db' => env('REDIS_DATABASE', 0)
        ]
    ],
    'bootstrap' => ['db', 'redis']
];