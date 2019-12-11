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
//        $config = config('session');
//        if (isset($config['save_path']) && !is_dir($config['save_path'])) {
//            mkdir($config['save_path']);
//        }

        /** @var Redis $redis */
        $redis = \Moon::$container->get('redis');
        $handler = new RedisSessionHandler($redis);
        session_set_save_handler(
            array($handler, 'open'),
            array($handler, 'close'),
            array($handler, 'read'),
            array($handler, 'write'),
            array($handler, 'destroy'),
            array($handler, 'gc')
        );

        // 下面这行代码可以防止使用对象作为会话保存管理器时可能引发的非预期行为
        register_shutdown_function('session_write_close');


        if (session_status() == PHP_SESSION_NONE) {
//            $config = empty($config) ? [] : $config;
//            session_start($config);


            session_start();
        }
        return $next($request);
    }
}