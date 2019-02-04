<?php

class AuthModule
{
    private function checkSession()
    {
        //this method should to get session information
        return 'user';
    }

    public function checkSecured()
    {
        if ($this->checkSession() == 'admin')
        {
            return 1;
        }
        return 0;
    }
}