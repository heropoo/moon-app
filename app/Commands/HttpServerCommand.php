<?php


namespace App\Commands;


class HttpServerCommand
{
    public function run()
    {
        echo "Running a http server on http://127.0.0.1:8000\n";
        exec('php -S 127.0.0.1:8000 -t ' . public_path());
    }
}