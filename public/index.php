<?php
/**
 * User: Heropoo
 * Date: 2018/1/11
 * Time: 17:38
 */

require __DIR__.'/../vendor/autoload.php';

use Moon\Application;

$app = new Application(dirname(__DIR__));
$app->run();
