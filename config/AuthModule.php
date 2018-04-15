<?php

class AuthModule
{
    private function checkSesion()
    {
        return 'user';
    }

    public function checkSecured()
    {
        if ($this->checkSesion() == 'admin')
        {
            return 1;
        }
        return 0;
    }
}