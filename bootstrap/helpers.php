<?php
/**
 * help functions
 * User: yy
 * Date: 17-3-7
 * Time: 下午11:32
 */

if (!function_exists('dump')) {
    /**
     * pretty var_dump
     * @params mixed $var
     */
    function dump($var)
    {
        if(is_cli()){
            foreach (func_get_args() as $var) {
                var_dump($var);
            }
        }else{
            echo '<pre>';
            foreach (func_get_args() as $var) {
                var_dump($var);
            }
            echo '</pre>';
        }
    }
}

if (!function_exists('dd')) {
    /**
     * pretty var_dump and exit 1
     * @param mixed $var
     */
    function dd($var)
    {
        dump($var);
        exit(1);
    }
}

if (!function_exists('config')) {
    /**
     * get a config
     * @param string $key
     * @param bool $throw
     * @return mixed|null
     */
    function config($key, $throw = false)
    {
        return \Moon\Config::get($key, $throw);
    }
}

if(!function_exists('app')){
    function app(){
        return \Moon\Moon::$app;
    }
}

if(!function_exists('request')){
    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    function request(){
        return \Moon\Moon::$app->getRequest();
    }
}


if(!function_exists('asset')){
    /**
     * @param string $path
     * @param bool $full
     * @return string
     */
    function asset($path, $full = true){
        /**
         * @var \Symfony\Component\HttpFoundation\Request $request
         */
        $request = \Moon\Moon::$app->getRequest();
        if($full){
            return $request->getSchemeAndHttpHost().$request->getBasePath().'/'.$path;
        }
        return $request->getBasePath().'/'.$path;
    }
}

if (!function_exists('is_cli')) {
    /**
     *判断当前的运行环境是否是cli模式
     */
    function is_cli()
    {
        return preg_match("/cli/i", php_sapi_name()) ? true : false;
    }
}


