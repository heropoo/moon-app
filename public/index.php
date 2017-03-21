<?php
require_once '../vendor/autoload.php';

$app = new \xxdx\Application(dirname(__DIR__));

//// Eloquent ORM
//$capsule = new Illuminate\Database\Capsule\Manager();
//$capsule->addConnection(require BASE_PATH.'/config/database.php');
//$capsule->bootEloquent();

$app
    ->enableDebug()
    ->run();