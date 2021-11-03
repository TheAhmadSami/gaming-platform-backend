<?php
  require_once("_config.php");

  if($_SERVER['PHP_AUTH_USER'] == AUTH_USER && $_SERVER['PHP_AUTH_PW'] == AUTH_PW){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $usernameCheck = ;
    
    if(){

    }


  }else{
    printError(json_encode("{'status': 'error', 'code': '401', 'message': 'Authntication Error'}"), 401);
  }//check server

?>