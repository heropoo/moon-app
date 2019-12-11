<?php
/**
 * Date: 2019-12-11
 * Time: 18:58
 */

namespace App\Handlers;


use Moon\Cache\Redis;

class RedisSessionHandler implements \SessionHandlerInterface
{
    /**
     * @var Redis
     */
    protected $redis;
    protected $prefix;

    public function __construct(Redis $redis, $prefix = 'redis-session:')
    {
        $this->redis = $redis;
        $this->prefix = $prefix;
    }

    public function close()
    {
        $this->redis->getClient()->disconnect();
        return true;
    }

    public function destroy($session_id)
    {
        $this->redis->getClient()->del([$session_id]);
        return true;
    }

    public function gc($maxlifetime)
    {
        return true;
    }

    public function open($save_path, $name)
    {
        //$this->prefix .= $name.':';
        return true;
    }

    public function read($session_id)
    {
        return $this->redis->get($session_id);
    }

    public function write($session_id, $session_data)
    {
        $this->redis->setex($session_id, 3600, $session_data);  //todo ttl
        return true;
    }

}