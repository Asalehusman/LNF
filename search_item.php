<?php
 include_once("lnf/Items.php");
 include_once("lnf/Item.php");

 if(!empty($_GET['cat'])){
 	$its = new Items();

 	$cat = $_GET['cat'];

    $items = $its->getByCategory($cat);
    echo(json_encode($items));

 }else if(!empty($_GET['name'])){
    $its = new Items();

 	$name = $_GET['name'];

    $items = $its->getByName($name);
    echo(json_encode($items));
 }else{
 	echo("err");
 }



?>