<?php
 session_start();
 include_once("lnf/Items.php");
 include_once("lnf/Item.php");

 if(!empty($_SESSION['name']) && !empty($_SESSION['pwd'])){
   if(!empty($_POST['i_name']) && !empty($_POST['cat']) && !empty($_POST['desc'])){
    $item = new Item();

    $name = $_POST['i_name'];
    $desc = $_POST['desc'];
    $cat = $_POST['cat'];

    $item->setName($name);
    $item->setCategory($cat);
    $item->setDescription($desc);

    if(!$item->exists()){
        echo("adding");
        $saved = $item->save();

        if($saved){
            header("location: success.php");
        }
    }

 }
 }else{
 	echo("err");
 }



?>