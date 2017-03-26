<?php
 session_start();
 include_once("lnf/User.php");

 if(!empty($_SESSION['name']) && !empty($_SESSION['pwd'])){
 	$sname = $_SESSION['name'];
 	$spwd = $_SESSION['pwd'];

 	$su = new User();
 	$su->setName($sname)->setPassword($spwd);

 	if($su->exists()){
         if(!empty($_POST['name']) && !empty($_POST['pwd'])){
        	  $us = new User();
 	          $name = $_POST['name'];
 	          $pwd = $_POST['pwd'];
echo($name);
   	          $us->setName($name)
 	             ->setPassword($pwd);

 	          if($us->exists()){ echo("exists laready");
 		          //header("location: super_user.php");
 	          }else{
 		          $us->save();
 		          header("location: super_user.php");
 	          }

           } 		
 	}
 }





?>