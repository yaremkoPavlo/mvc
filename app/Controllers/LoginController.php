<?php
namespace App\Controllers;
use Core\Auth;
use Core\Controller;
use Core\Router;
use Core\View;

class LoginController extends Controller
{

    public function index()
    {
        $data = $_POST;

        if (Auth::isAuth()) {
            //
            View::renderTemplate('basic','logged');
        }
        if (!Auth::isAuth() && !empty($data)) {
            Auth::setAuth($data['login']);
            View::renderTemplate('basic','logged');
        } else {
            //
            View::renderTemplate('basic', 'login_view');
        }
    }

    public function logout()
    {
        Auth::unsetAuth();
        Router::redirect('/login');
    }

}