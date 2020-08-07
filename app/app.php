<?php

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

$routes=require(__DIR__  . DIRECTORY_SEPARATOR .'config/' . 'routes.php');

$microCollections=[];
foreach($routes as $key=>$row):
  $microCollections[$key]=new Phalcon\Mvc\Micro\Collection();
  //$microCollections[$key]->setHandler($row["controller"], true);
  $microCollections[$key]->setHandler($row["controller"],true);
  //$controller=new $row["controller"]();
  foreach($row["data"] as $name=>$action):
    $routeName="c-$key-a-$name";
    $microCollections[$key]->{$action["method"]}($action["path"],$action["action"],$routeName);
    //call_user_func_array([$microCollections[$key],$action["method"]],[$action["path"],$action["action"]]);
    //$app->{$action["method"]}($action["path"], [$controller,$action["action"]])->setName($name);
  endforeach;
  $app->mount($microCollections[$key]);
endforeach;

//$manager=$di->getShared('eventsManager');

//$manager->attach("micro", new FirewallMiddleware());
//$app->setEventsManager($manager);
$app->before(function () use ($app,$routes) {
    $app->logger->info("POST Request: " . json_encode($_POST));
    $app->logger->info("GET Request: " . json_encode($_GET));
    $app->logger->info("POST Body Request: " . file_get_contents("php://input"));
    $app->logger->info("FILE  Request: " . json_encode($_FILES));
    $app->logger->info($app->systemHelper->clientIp()."-Header: " . json_encode($app->systemHelper->getallheaders()));

    if($app->checkAuth):
        $query=<<<HAIKAL
        SELECT * FROM applications WHERE app_id=:app_id
        HAIKAL;
        $result=$app->dbHelper->query($query,[
          "app_id"=> $app->requestApi->applicationId,
        ]);
        $row=$result->fetch();
        if(!$row):
          throw new Exception(null, Constants::E_INVALID_APPLICATION);
        endif;
        if($row->token!= $app->requestApi->token):
          throw new Exception(null, Constants::E_TOKEN_INVALID);
        endif;
    endif;
    //print_r($matched->getName());
    return true;

});

$app->setService("checkAuth", function () use ($app,$routes){
    $router=$app->getRouter();
    $matched = $router->getMatchedRoute();
    $routeName=$matched->getName();
    list($controller,$controllerIndex,$action,$actionIndex)=explode("-", $routeName);
    $route=$routes[$controllerIndex]["data"][$actionIndex];
    return isset($route["checkAuth"]) ? $route["checkAuth"]: true;
});

$app->after(function () use ($app,$routes) {
    $app->responseApi->message=$app->responseApi->message??ErrorMessage::show($app->responseApi->status);
    $app->logger->info("Response: " . json_encode($app->responseApi));
    $app->response->setJsonContent($app->responseApi)->sendHeaders();
    $app->response->send();
});

/**
 * Add your routes here
 */
// $app->get('/', function () {
//     echo $this['view']->render('index');
// });

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->responseApi->message=$app->responseApi->message??ErrorMessage::show($app->responseApi->status);
    $app->response->setJsonContent($app->responseApi)->sendHeaders();
    $app->response->send();
});

$app->error(function ($exception) use($app) {
    $app->responseApi->status=$exception->getCode()==0? Constants::E_GENERIC :$exception->getCode();
    $app->responseApi->message=ErrorMessage::show($app->responseApi->status);
    if($app->responseApi->status==Constants::E_GENERIC):
      $app->responseApi->message .=" (".$exception->getMessage() .")";
    endif;
    if(!empty($exception->getMessage())):
      $app->responseApi->message .=" (".$exception->getMessage() .")";
    endif;
    $app->logger->error("Response: " . json_encode($app->responseApi));
    $app->logger->error("Response System: " . json_encode($exception->getMessage()));
    $app->response->setJsonContent($app->responseApi);
    $app->response->send($app->responseApi);
    exit;
  });
  