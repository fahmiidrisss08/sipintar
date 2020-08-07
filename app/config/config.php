<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

if (file_exists(APP_PATH . "/config/environment.php")) :
    $envConfig = require(APP_PATH  . "/config/environment.php");
    $environment = isset($envConfig->environment) ? $envConfig->environment : "development";
else :
    $environment = "development";
endif;
defined('APP_ENV') ||
    define('APP_ENV', $environment);

$config = new \Phalcon\Config([
    'database' => [
        'host'       => 'localhost',
        'username'   => 'root',
        'password'   => '',
        'dbname'     => 'example',
        'charset'    => 'utf8',
    ],

    'application' => [
        'modelsDir'      => APP_PATH . '/models/',
        'controllersDir'      => APP_PATH . '/controllers/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'helpersDir'       => APP_PATH . '/helpers/',
        'middlewareDir'       => APP_PATH . '/middleware/',
        'libraryDir'       => APP_PATH . '/library/',
        'logsDir'       => BASE_PATH . '/logs/',
        'baseUri'        => '/',
        "hostname"=>$_SERVER["HTTP_HOST"], 
        "schema"=>!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !=="off"? "https": "http", 
    ],
    "token"=>[
        "expire"=> 86650,
    ],
    "security"=>[
        "web_sipintar"=>[
            "username"=>"040825aa-35e2-40f4-9cd5-d63d2f75d0f6",
            "password"=>"526d2ef0-78c3-44a5-9595-35c0af275d90",
        ],
        "web_absen"=>[
            "username"=>"1027423c-e33d-49d8-aef0-c1e15dd90e86",
            "password"=>"185710da-f6a2-4d06-8f97-101c8e318742",
        ],
    ]
]);


// override production config by environment config
$configFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'env' . DIRECTORY_SEPARATOR . APP_ENV . '.php';
if (file_exists($configFile)) :
    $configEnv = require('env' . DIRECTORY_SEPARATOR . APP_ENV . '.php');
    $config->merge($configEnv);
endif;

return $config;
