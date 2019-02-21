<?php

return array(
     # 'url' => 'controller/action/param1/param2/param3'
    '/' => 'Main/index',
    '/login' => 'Login/index',
    '/logout' => 'Login/logout',
    '/contacts' => 'Main/contacts',
    '/blog' => 'Blog/index',
    '/blog/${id}' => 'Blog/viewPost/$1',
    #'/blog/${any}/${id}' => 'BlogController/$1/$2',
    '/${any}' => 'Main/anyAction'
);


