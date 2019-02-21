<?php
namespace Core;


class Auth
{
    /**
     * @return bool
     */
    public static function isAuth()
    {
        return isset($_SESSION['logged_user']);
    }

    public static function setAuth($user)
    {
        if (!self::isAuth()) {
            $_SESSION['logged_user'] = $user;
        }
    }

    public static function unsetAuth()
    {
        session_unset();
    }
}