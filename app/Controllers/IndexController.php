<?php
/**
 * User: Heropoo
 * Date: 2018/1/11
 * Time: 22:11
 */

namespace App\Controllers;

use App\Models\User;
use Moon\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
//        var_dump($this->user);
        //$_SESSION['page'] = request()->getUri();
        $view = view('hello', [], 'layouts/main');
        $view->title = 'Welcome to use Moon App';
        return $view;
    }
}