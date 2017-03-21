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
        echo '<pre>';
        foreach (func_get_args() as $var) {
            var_dump($var);
        }
        echo '</pre>';
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
        return \xxdx\Config::get($key, $throw);
    }
}

