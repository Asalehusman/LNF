<!DOCTYPE html>
<html>
<head>
	<title>signin</title>
	<style>
    	@import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
        
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>
</head>
<body>

    <br><br>
    <div class="container">
      <div class="alert alert-warning text-center">
        You have to be an ADMIN to add Item.
       </div>
    </div><br><br>

	<div class="container">	
      
        
    		<form action="sigin.php" method='post'>
    		  <div class="row">
    		    <div class="col-md-5 "></div>
    		    <div class="col-md-3 ">
        			<label>Username:</label><br>
        			<input type="text" name="uname">
        		 </div>
        		 <div class="col-md-4 "></div>
    		  </div><br>
    		  <div class="row ">
    		    <div class="col-md-5 "></div>
    		    <div class="col-md-3">
        			
    			<label>Password:</label><br>
    			<input type="Password" name="upwd">
         		 </div>
         		 <div class="col-md-4 "></div>
    		  </div>
    		  		<br>
    		  <div class="row ">
    		    <div class="col-md-5 "></div>
    		    <div class="col-md-3">
        			<input class="btn btn-default btn-block" type="submit" name="submit" value="submit">

         		 </div>
         		 <div class="col-md-4 "></div>
    		  </div>
    			
    		</form>
        
      
   </div>

</body>
</html>