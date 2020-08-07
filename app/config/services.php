<?php
declare(strict_types=1);

use Phalcon\Mvc\View\Simple as View;
use Phalcon\Url as UrlResolver;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * Sets the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    return $view;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    // $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    // $connection = new PDO("sqlsrv:Server={$config->database->host};Database={$config->database->dbname}", $config->database->username, $config->database->password);  
    // $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // //$connection->query("SET DATEFORMAT yyyy-MM-dd hh:mm:ss");
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    
    $params=$config->database->toArray();
    unset($params['adapter']);

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }

    $connection = new $class($params);
    
    return $connection;

});

$di->setShared('dbHelper', function () {
    return new DbHelper();
});
$di->setShared('random', function () {
    return new \Phalcon\Security\Random();
});

$di->setShared("logger", function () {
    $config = $this->getConfig();
    $formatter = new \Phalcon\Logger\Formatter\Line('[%date%] - [%type%] - {ip} -  %message%');
    $enterpriseDir=$config->application->logsDir .  date("Y-m") . "/";
    if(!file_exists($enterpriseDir)):
        mkdir($enterpriseDir,0755,true);
    endif;
    $adapterMain = new Stream($enterpriseDir. "sipintar-enterprise-api-" . date("Y-m-d") . ".log");
    $adapterMain->setFormatter($formatter);
    return new Logger('messages', [
        "main" => $adapterMain,
    ]);
});


$di->setShared("responseApi",function(){
    return new ResponseApi();
  });
  
  $di->setShared("requestApi",function() {
    $request=new RequestApi();
    $request->applicationId=$this->getRequest()->getHeader("app");
    $request->token=$this->getRequest()->getHeader("token");
    $request->limit=$this->getRequest()->getQuery("l","int",20);
    $request->offset=$this->getRequest()->getQuery("o","int",0);
    $request->sort=$this->getRequest()->getQuery("s");
    return $request;
  });
  
  $di->setShared("systemHelper",function(){
    return new SystemHelper();
  });
