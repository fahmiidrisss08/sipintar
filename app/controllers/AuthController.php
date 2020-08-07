<?php
class AuthController extends Phalcon\Mvc\Controller
{
  /**
   *
   * @SWG\Post(
   *   path="/auth/token",
     *   summary="Get Token Access User",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *     in="formData",
     *     type="string",
     *     name="u",
     *     required=true,
     *     description="Username",
     *   ),
     *     @SWG\Parameter(
     *     in="formData",
     *     type="string",
     *     name="p",
     *     required=true,
     *     description="Password ",
     *   ),
     *     @SWG\Parameter(
     *     in="formData",
     *     type="string",
     *     name="app_id",
     *     required=true,
     *     description="Application ID",
     *   ),
     *     @SWG\Parameter(
     *     in="formData",
     *     type="string",
     *     name="ft",
     *     required=true,
     *     description="Firebase Token",
     *   ),
     *     @SWG\Parameter(
     *     in="formData",
     *     type="string",
     *     name="app_version",
     *     required=true,
     *     description="App Version",
     *   ),
     *     @SWG\Parameter(
     *     in="formData",
     *     type="string",
     *     name="device",
     *     required=true,
     *     description="Device Name",
     *   ),
   *   @SWG\Response(
   *     response=200,
   *     description="success",
   *    @SWG\Schema(ref="#/definitions/ResponseApi")
   *   )
   * )
   */
  public function postToken()
  {
      $username=$this->request->getPost("u");
      $password=$this->request->getPost("p");
      $appId=$this->request->getPost("app_id");
      $version=$this->request->getPost("app_version");
      $firebaseToken=$this->request->getPost("ft");
      $device=$this->request->getPost("device");

      try  { 
        $found=false;
        foreach($this->config->security as $key=>$row):
          if($row->username==$username && $row->password==$password):
            $userId=$username;
            $found=true;
            break;
          endif;
        endforeach;
        
        // if($this->config->security->web_sipintar->username!=$username || $this->config->security->web_sipintar->password!=$password ):
        if(!$found):
          $result=$this->dbHelper->query("SELECT * FROM users WHERE username=:username",[
            "username"=> $username,
          ]);
          $user=$result->fetch();
          if(!$user):
              throw new Exception(null, Constants::E_USER_NOT_EXISTS);
          endif;
          if(!$this->security->checkHash($password,$user->password)):
            throw new Exception(null, Constants::E_INVALID_PASSWORD);
          endif;
          if($user->status!=1):
            throw new Exception(null, Constants::E_USER_INACTIVE);
          endif;
          $userId=$user->id;
        endif;
        // Delete eksisting app_id

        $result=$this->dbHelper->query("DELETE FROM applications WHERE app_id=:app_id",[
          "app_id"=> $appId,
        ]);

        $token=$this->random->uuid();
        //print "INSERT INTO applications(user_id,app_id,token,[version],firebase_token,expire,device) VALUES (:user_id,:app_id,:token,:version,:firebase_token,:expire,:device";
        $time=strtotime($this->config->token->expire . " seconds");
        $result=$this->dbHelper->query("INSERT INTO applications(user_id,app_id,token,[version],firebase_token,expire,device) VALUES (:user_id,:app_id,:token,:version,:firebase_token,:expire,:device)",[
          "user_id"=> $userId,
          "app_id"=> $appId,
          "token"=> $token,
          "version"=> $version,
          "firebase_token"=> $firebaseToken,
          "expire"=> date("Y-m-d H:i:s",strtotime($this->config->token->expire . " seconds")),
          "device"=> $device,
        ],[
           //"expire"=> PDO::PARAM_STR,
        ]);

        $this->responseApi->status=Constants::E_SUCCESS;
        $this->responseApi->data->token=$token;
      } catch (PDOException $pdoException)
      {
        throw new Exception($pdoException->getMessage(), Constants::E_DATABASE);
      }
  }


    /**
   *
   * @SWG\Get(
   *   path="/auth/logout",
     *   summary="Logout",
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
   */
  public function getLogout()
  {

    $result=$this->dbHelper->query("SELECT * FROM applications WHERE app_id=:app_id",[
      "app_id"=> $this->requestApi->applicationId,
    ]);
    $user=$result->fetch();
    if(!$user):
      throw new Exception(null, Constants::E_USER_NOT_EXISTS);
    endif;
    $result=$this->dbHelper->query("DELETE FROM applications WHERE app_id=:app_id",[
      "app_id"=> $this->requestApi->applicationId,
    ]);
    $this->responseApi->status=Constants::E_SUCCESS;
        
  }
}