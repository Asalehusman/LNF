<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>add item</title>
	<style>
    	@import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
        
	</style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>
</head>
<body>
    
    <center><h1>ADD LOST ITEMS</h1></center>
    	<form action="add_item.php" method='post'>
    	 <div class="row">
	    	<div class="col-md-5 "></div>
	    	<div class="col-md-3 ">
    		  <input type="text" name="i_name">
    		</div>
    	 </div><br>

    	  <div class="row">
	    	<div class="col-md-5 "></div>
	    	<div class="col-md-3 ">
    		 <select name="cat" value="category">
    			<option value="laptop">Latop</option>
    			<option value="id" selected="selected">ID</option>
    			<option value="phones">Phone</option>
    			<option value="others">others</option>	
    		  </select>
    		</div>
    	  </div><br>


         <div class="row">
	    	<div class="col-md-5 "></div>
	    	<div class="col-md-3 ">
    		<textarea rows="5" cols="20" name="desc"></textarea>
    	   </div>
    	  </div><br>


           <div class="row">
	    	<div class="col-md-5 "></div>
	    	<div class="col-md-3 ">
    		<input class="btn btn-default" type="submit" name="submit" value="submit">
    		</div>
    	  </div>

        </form>

        <div class="row">
            <div class="col-md-5 "></div>
            <div class="col-md-3">
          <button data-toggle="collapse" data-target="#adduser">ADD USER</button>
          </div>
          </div>

<div id="adduser" class="collapse">
 <form action="add_user.php" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
        
</body>
</html>