<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerDirs(
    [
        $config->application->modelsDir,
        $config->application->helpersDir,
        $config->application->controllersDir,
        $config->application->logsDir,
        $config->application->middlewareDir,
        $config->application->libraryDir,
    ]
)->register();

$loader->registerNamespaces(
    [
       "Swagger" => BASE_PATH . "/vendor/zircote/swagger-php/src/",
       "Symfony\\Component\\Finder" => BASE_PATH . "/vendor/symfony/finder",
       "Doctrine\\Common\\Annotations" => BASE_PATH . "/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations",
       "Doctrine\\Common\\Lexer" => BASE_PATH . "/vendor/doctrine/lexer/lib/Doctrine/Common/Lexer",
    ]
);