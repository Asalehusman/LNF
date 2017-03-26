<?php
 session_start();
 include_once("lnf/User.php");

 if(!empty($_POST['uname']) && !empty($_POST['upwd'])){
 	$us = new User();
 	$name = $_POST['uname'];
 	$pwd = $_POST['upwd'];

    
 	$us->setName($name);
 	$us->setPassword($pwd);

    $_SESSION['name'] = $name;
    $_SESSION['pwd'] = $pwd;

 	if($us->exists()){
 		header("location: super_user.php");
 	}else{
 		echo("you entered wrong details");
 	}

 }



?>