<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class MainController extends Controller
{
    public function index()
    {
        //print "SIPINTAR API";
        $this->responseApi->status=Constants::E_SUCCESS;
        $this->responseApi->message="SIPINTAR API";
    }
    public function doc()
    {
      $username = $_SERVER['PHP_AUTH_USER'];
      $result=$this->dbHelper->query("SELECT * FROM users WHERE username=:username",[
        "username"=> $username,
      ]);
      
      $user=$result->fetchObject();
      if($user){
        if (!($this->security->checkHash($_SERVER['PHP_AUTH_PW'],$user->password))) {
          header('WWW-Authenticate: Basic realm="SIPINTAR Access"');
          header('HTTP/1.0 401 Unauthorized');
          echo 'Your are not authorized';
          exit;
        }
      }else{
        header('WWW-Authenticate: Basic realm="SIPINTAR Access"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Your are not authorized';
        exit;
      }
      
      echo $this->view->render("main/doc.phtml");
      exit;
    }
  
    /**
     *
     * @SWG\Get(
     *   path="/generate/{t}",
     *   tags={"Auth"},
     *   summary="Generate Hash Security",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *     in="path",
     *     type="string",
     *     name="t",
     *     required=true,
     *     description="Text to Hash",
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="success",
     *    @SWG\Schema(ref="#/definitions/ResponseApi")
     *   )
     * )
     * @return string
     */
  
    public function generate($textString="")
    {
      $this->responseApi->status=0;
      $this->responseApi->message="Success";
      $this->responseApi->data->hash= $this->security->hash($textString);
    }
  
    /**
     *
     * @SWG\Get(
     *   path="/sha512/{t}",
     *   tags={"Auth"},
     *   summary="Generate Hash SHA512",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *     in="path",
     *     type="string",
     *     name="t",
     *     required=true,
     *     description="Text to Hash",
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="success",
     *    @SWG\Schema(ref="#/definitions/ResponseApi")
     *   )
     * )
     * @return string
     */
  
    public function sha512($textString="")
    {
      $this->responseApi->status=0;
      $this->responseApi->message="Success";
      $this->responseApi->data->hash=hash("sha512",$textString);
    }
  
   
    public function swagger()
    {
      $username = $_SERVER['PHP_AUTH_USER'];
      $result=$this->dbHelper->query("SELECT * FROM users WHERE username=:username",[
        "username"=> $username,
      ]);
      
      $user=$result->fetchObject();
      if($user){
        if (!($this->security->checkHash($_SERVER['PHP_AUTH_PW'],$user->password))) {
          header('WWW-Authenticate: Basic realm="SIPINTAR Access"');
          header('HTTP/1.0 401 Unauthorized');
          echo 'Your are not authorized';
          exit;
        }
      }else{
        header('WWW-Authenticate: Basic realm="SIPINTAR Access"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Your are not authorized';
        exit;
      }
      //if{
      require_once BASE_PATH . "/vendor/zircote/swagger-php/src/functions.php";
      $swagger = \Swagger\scan(APP_PATH);
      header('Content-Type: application/json');
      echo $swagger;
      exit;
      //}
    }
    
  
    /**
     *
     * @SWG\Post(
     *   path="/time",
     *   tags={"Auth"},
     *   summary="Get Time Server",
     *   produces={"application/json"},
       *     @SWG\Parameter(
       *     in="header",
       *     type="string",
       *     name="app",
       *     required=true,
       *     description="Application ID",
       *   ),
       *     @SWG\Parameter(
       *     in="header",
       *     type="string",
       *     name="token",
       *     required=true,
       *     description="Token",
       *   ),     
     *   @SWG\Response(
     *     response=200,
     *     description="success",
     *    @SWG\Schema(ref="#/definitions/ResponseApi")
     *   )
     * )
     * @return string
     */
  
    public function getTime()
    {
      $this->responseApi->status=0;
      $this->responseApi->message="Success";
      $this->responseApi->data->format1=date("Y-m-d H:i:s");
      $this->responseApi->data->format2=time();  
  
    }
  
}