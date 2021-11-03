<?php
  require_once("_config.php");

  // if($_SERVER['PHP_AUTH_USER'] == AUTH_USER && $_SERVER['PHP_AUTH_PW'] == AUTH_PW){

    $token=$_POST['token'];

    $dbResult = $db->query("SELECT user_id FROM users_tokens WHERE token=:token", [':token'=>$token]);
    if ($dbResult) {
      
      printResult($dbResult);
    }else{
      printError(false, 403);
    }


  // }else{
  //   printError("{'status': 'error', 'code': '401', 'message': 'Authntication Error'}", 401);
  // }//check server

?>