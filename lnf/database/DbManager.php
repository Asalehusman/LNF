<?php

 class DbManager{
   public $db_object = null;
   private $default_db, $default_user, $default_password, $default_host;

   private $db_options = array("host"=> "localhost", "user"=> "root", "password"=>"", "db"=> "lnf");

   public function __construct(){
     $this->default_db = "lnf";
     $this->default_user = "root";
     $this->default_password = "";
     $this->default_host = "localhost";
  }

   #connect to db returning the connecton object
   public function connectToDb($opts = array("host"=> "localhost", "user"=> "root", ""=> "", "db"=> "lnf")){
       if(empty($opts['host'])){
          $opts['host'] = "localhost";
       }

       if(empty($opts['user'])){
          $opts['user'] = "root";
       }

       if(empty($opts['password'])){
          $opts['password'] = "";
       }

       if(empty($opts['db'])){
          $opts['db'] = "lnf";
       }

        //connect to db
        try{
           $handle = new PDO("mysql:host={$opts['host']};dbname={$opts['db']}",  $opts['user'], $opts['password']);
           $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $db_handle = $handle;
           $this->db_object = $handle;
        }catch(PDOException $e){
          echo ("An error ocurred". $e->getMessage());
          $db_handle = null;
          $this->db_object = null;
        }

        if($this->db_object != null){
          #echo("suceeded");
        }
       return $this->db_object;
     }

   public function setDbDefaults(){
     $this->default_db = "gigs_arena";
     $this->default_user = "root";
     $this->default_host = "localhost";
     $this->default_password = "";
   }

   public function getDbDefaults(){
     return array("host"=> $this->default_host, "user"=> $this->default_user, "password"=> $this->default_password, "db"=> $this->default_db);
     #return array("host"=> "localhost", "user"=> "root", "password"=> " ", "db"=> "gigs_arena");
   }

   public function disconnectFromDb(){
     $this->db_object = null;
   }

   public function connect($host="localhost", $user="root", $passcode="", $databaseName="gigs_arena"){
        //connect to db
        try{
           $handle = new PDO("mysql:host={$host};dbname={$databaseName}",  $user, $passcode);
           $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $dbHandle = $handle;
        }catch(PDOException $e){
          echo ("An error ocurred". $e->getMessage());
          $dbHandle = null;
        }

        if($dbHandle != null){
          echo("suceeded");
        }
       return $dbHandle;
     }

     //clear database table
     public function clearTable($table){
       try{
         $this->db_object->beginTransaction();

         $query = "delete * from $table";
         $stmt = $this->db_object->prepare($query);
         $stmt->execute();

         $this->db_object->commit();
       }catch(PDOException $e){}
     }



     public function __destruct(){
       $this->disconnectFromDb();
     }

 }#end class


?>
