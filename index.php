<?php
 include_once("lnf/Items.php");
 include_once("lnf/Item.php");

 if(!empty($_GET['cat'])){
  $its = new Items();

  $cat = $_GET['cat'];
  
  $all_items = $its->getByCategory($cat);

 }else if(!empty($_GET['name'])){
    $its = new Items();

     $name = $_GET['name'];

    $all_items =$its->getByName($name);
   
 }else{
  $its = new Items();
 $all_items = $its->getAll();
 }
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>


	<!-- CDN FILES -->
	<style>
    	@import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
        
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>

</head>
<body>

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">LOST AND FOUND
      </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>&nbsp
    </ul>
    <form action="index.php" method="get" class="navbar-form navbar-left">

         <select name="cat" class="" id="sel1">
           <option value="">--select category--</option>
           <option value="laptops">Laptops</option>
           <option value="phones">Phones</option>
           <option value="id">Ids</option>
         </select> 

  <div class="input-group">
    <input type="text" name="name" class="form-control" placeholder="Search">
    <div class="form-group">
  
</div>
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
  </div>
</nav>


	<div class="container">	
       <?php
          #var_dump($all_items);
          foreach($all_items as $item){
          	echo("<div class='row col-sm-4'>");
            echo($item['name']. "<br>");
            echo($item['desc']. "<br>");
            echo($item['cat']);
          	echo("</div>");
          }
       ?>
	</div>
	<br><br>

	<div class="container">	
      <div class="row">
        <div class="col-sm-12 text-center">
          <a href="signin.php" class="btn btn-default">ADD LOST ITEM</a>
        </div>
      </div>
   </div>
</body>
</html>