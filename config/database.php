<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2017/3/8
 * Time: 15:19
 */
return [
    'default'=> 'mysql',

    'connections'=>[
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'localhost:3306',
            'database'  => 'moon',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => storage_path('moon.sqlite'),
            'prefix' => '',
        ],
    ]
];