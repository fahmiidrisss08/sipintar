<?php

class SystemHelper extends \Phalcon\Di\Injectable
{
    public function clientIp()
    {
        $ipaddress = '';
        /*if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
             $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))*/
                $ipaddress = $_SERVER['REMOTE_ADDR'];
        /*else
                $ipaddress = 'UNKNOWN';*/
        return $ipaddress;

    }
    public function getallheaders()
    {
      if (!function_exists('getallheaders')):
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', strtolower(str_replace('_', ' ', substr($name, 5))))] = $value;
            }
        }
      else:
        $headers=getallheaders();
      endif;
      return $headers;
    }
  
  
}