<?php
  require_once("_config.php");

  if($_SERVER['PHP_AUTH_USER'] == AUTH_USER && $_SERVER['PHP_AUTH_PW'] == AUTH_PW){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $dbResult = $db->query("SELECT * FROM users WHERE username=:username", [':username'=>$username]);
    if ($dbResult) {
      if (password_verify($password, $dbResult[0]['password'])) {
        $token = setUserToken($dbResult[0]['id']);
        
        printResult('{"token": '. "$token" .'}');
      }
    }


  }else{
    printError("{'status': 'error', 'code': '401', 'message': 'Authntication Error'}", 401);
  }//check server

?>