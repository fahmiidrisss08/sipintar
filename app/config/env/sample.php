<?php
return  new \Phalcon\Config([
    'database' => [
        'host'       => 'localhost',
        'username'   => '',
        'password'   => '',
        'dbname'     => 'sipintar_enterprise',
        'charset'    => 'utf8',
    ],

    'application' => [
        'baseUri'        => '/',
    ],
    "security"=>[
        "web_sipintar"=>[
            "username"=>"",
            "password"=>"", 
        ],
        "web_absen"=>[
            "username"=>"",
            "password"=>"", 
        ],
    ]
]);