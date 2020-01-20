<?php

require_once __DIR__.'/../vendor/autoload.php';

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Moon\Application;

$app = new Application(dirname(__DIR__));

$host = env('SW_HTTP_HOST', '0.0.0.0');
$port = env('SW_HTTP_PORT', 9501);

$server = new Server($host, $port);

$server->on("start", function ($server) use ($host, $port) {
    echo "Http server listening on http://$host:$port , you can open url http://127.0.0.1:$port in browser.\n";
});

$server->on('request', function (Request $request, Response $response) use ($app) {

    $res = $app->handleSwooleRequest($request, $response);

    //access log
    $server = $request->server;
    $msg = '[' . date('Y-m-d H:i:s') . '] ' . $server['remote_addr'] . ':' . $server['remote_port']
        . ' ' . $server['request_method'] . ':' . $server['path_info'];
    $msg .= isset($server['query_string']) ? '?' . $server['query_string'] : '';
    $msg .= ' ' . $res->getStatusCode();
    echo $msg . PHP_EOL;
});

$server->start();
