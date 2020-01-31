<?php
/**
 * Date: 2020/1/31
 * Time: 17:13
 */

$public_path = realpath(__DIR__.'/../public');

echo "Running a http server on http://127.0.0.1:8000\n";
exec('php -S 127.0.0.1:8000 -t ' . $public_path);