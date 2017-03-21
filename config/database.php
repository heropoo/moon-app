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
            'database'  => 'blog',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => 'tt_',
            'strict'    => false,
        ],
    ]
];