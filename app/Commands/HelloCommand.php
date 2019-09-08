<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/7/14
 * Time: 1:40
 */
namespace App\Commands;

use Moon\Command;

class HelloCommand extends Command
{
    public function run(){
        echo 'Hello Moon'.PHP_EOL;
        return 0;
    }
}