<?php

/**
 * Database
 * User: ttt
 * Date: 2017/3/8
 * Time: 15:26
 */

$config = require dirname(__DIR__).'/config/database.php';

// Eloquent ORM
$capsule = new Illuminate\Database\Capsule\Manager();

foreach($config['connections'] as $name => $val){
    if($config['default'] == $name){
        $capsule->addConnection($val, 'default');
    }
    $capsule->addConnection($val, $name);
}

$capsule->bootEloquent();