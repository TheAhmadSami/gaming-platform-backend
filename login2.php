<?php
  require_once("_config.php");

  if($_SERVER['PHP_AUTH_USER'] == AUTH_USER && $_SERVER['PHP_AUTH_PW'] == AUTH_PW){

    $dbResult = $db->query("SELECT * FROM users");

    // printResult($dbResult);
    print_r($dbResult);


  }else{
    printError("{'status': 'error', 'code': '401', 'message': 'Authntication Error'}", 401);
  }//check server

?>