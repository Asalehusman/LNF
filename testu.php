<?php
 
 include_once("lnf/Item.php");
 include_once("lnf/User.php");

 $u = new User();
 $u->setName("abu");
 $u->setPassword("abdir5002");

 $u->save();

?>