<?php
require_once '../vendor/autoload.php';

$app = new \Moon\Application(dirname(__DIR__));

$app->enableDebug();
$app->run();