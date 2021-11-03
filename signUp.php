<?php
  require_once("_config.php");

  if($_SERVER['PHP_AUTH_USER'] == AUTH_USER && $_SERVER['PHP_AUTH_PW'] == AUTH_PW){

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $emailCheck = $db->query('SELECT * from users WHERE email=:email', [':email'=>$email]);
    if (!$emailCheck) {
      $usernameCheck = $db->query('SELECT * from users WHERE username=:username', [':username'=>$username]);
      if (!$usernameCheck) {

        $userId = $db->query("INSERT INTO users (
          email,
          username,
          password) VALUES(
          :email,
          :username,
          :password)", [
            ':email'=>$email,
            ':username'=>$username,
            ':password'=>password_hash($password, PASSWORD_DEFAULT)
          ]);

          if ($userId) {

            $token = setUserToken($userId);

            printResult("token: $token");
          }

      }else{
        printError("{'status': 'error', 'code': '401', 'message': 'Username already exists'}", 409);
      }//check username


    }else{
      printError("{'status': 'error', 'code': '401', 'message': 'Email already exists'}", 409);
    }//check email

  }else{
    printError("{'status': 'error', 'code': '401', 'message': 'Authntication Error'}", 401);
  }//check server

?>