<?php
  require_once("_config.php");

  // if($_SERVER['PHP_AUTH_USER'] == AUTH_USER && $_SERVER['PHP_AUTH_PW'] == AUTH_PW){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $dbResult = $db->query("SELECT id, first_name, last_name, username, password FROM users WHERE username=:username", [':username'=>$username]);
    if ($dbResult) {
      if (password_verify($password, $dbResult[0]['password'])) {
        $token = setUserToken($dbResult[0]['id']);

        unset($dbResult[0]['password']);
        $dbResult[0] = $dbResult[0] + array('token' => $token);

        printResult($dbResult);
      }
    }


  // }else{
  //   printError("{'status': 'error', 'code': '401', 'message': 'Authntication Error'}", 401);
  // }//check server

?>