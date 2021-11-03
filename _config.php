<?php

  // error_reporting(0); 
  set_time_limit(0);
  require_once("_databaseConnection.php");
  header("Content-Type: application/json; charset=UTF-8");
  header('Access-Control-Allow-Origin: *');


  $db = new DB("127.0.0.1", "gaming_platform", "root", "");

  //API AUTHENTICATION  *******************************************************
  define("AUTH_USER", "sam");
  define("AUTH_PW", "1234");


  function setUserToken($userId){
    
    global $db;
    $token = null;

    do {
      $token = generateToken();
      $dbResult = $db->query('SELECT token FROM users_tokens WHERE token=:token', [':token'=>$token]);
    } while($dbResult);

    $db->query("INSERT INTO users_tokens (token, user_id)
    VALUES (
      :token,
      :user_id)", [
        ":token"=>$token,
        ":user_id"=>$userId
      ]);

    return $token;
  }

  //PUBLIC FUNCTIONS  *******************************************************
  function printResult($data){
    echo json_encode($data);
    http_response_code(200);
  }

  function printError($mesaage, $code){
    echo json_encode($mesaage);
    http_response_code($code);
  }

  function generateToken(){
    $cstrong = true;
    return bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
  }

?>