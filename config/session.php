<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/7/12
 * Time: 23:15
 */

return [
    'driver'=> env('SESSION_DRIVER', 'file'), //file or redis
    'name'=>'MOON-SESSION-ID',
    'cookie_lifetime' => 3 * 3600,  //3hour
    //'read_and_close' => true,
    'cookie_httponly'=> true,
    'save_path'=> Moon::$app->getRootPath().'/runtime/sessions'
];