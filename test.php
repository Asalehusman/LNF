<?php
 
 include_once("lnf/Item.php");
 include_once("lnf/Items.php");

 $it = new Item(0, "laptop 789");
 $it->setDescription("fairly new hp");
 $it->setCategory("laptops");
 
 #echo($it->getName());
 #$it->save();
 $it->setId(9);
 $it->setName("laptop 789");

 echo("<br>");
 #$it->delete();
 #echo($it->exists());

 /* tests for items class */
 $is = new Items();
 #$items = $is->getByCategory("phones");
 $items = $is->getByName("tabs");
 foreach($items as $it){
 	echo($it['name'] ."<br>");
 	echo($it['cat'] ."<br>");
 	echo($it['desc'] ."<br>");
 }

?>