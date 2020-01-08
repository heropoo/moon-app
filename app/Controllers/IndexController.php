<?php
/**
 * User: Heropoo
 * Date: 2018/1/11
 * Time: 22:11
 */

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $view = view('hello', [], 'layouts/main');
        $view->title = 'Welcome to use Moon App';
        return $view;
    }
}