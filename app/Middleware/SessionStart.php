<?php
/**
 * User: Heropoo
 * Date: 2018/1/29
 * Time: 14:14
 */

namespace App\Middleware;

use App\Handlers\RedisSessionHandler;
use Moon\Cache\Redis;
use Symfony\Component\HttpFoundation\Request;
use Closure;

class SessionStart
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $config = config('session');
        if ($config['driver'] == 'redis') {
            /** @var Redis $redis */
            $redis = \Moon::$container->get('redis');
            $handler = new RedisSessionHandler($redis->getClient());
            session_set_save_handler($handler, true);
        } else {
            if (isset($config['save_path']) && !is_dir($config['save_path'])) {
                mkdir($config['save_path']);
            }
        }

        unset($config['driver']);

        if (session_status() == PHP_SESSION_NONE) {
            $config = empty($config) ? [] : $config;
            session_start($config);
        }
    }
}