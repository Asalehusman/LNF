<?php

include_once("database/DbManager.php");

class User{
	private $name, $id, $pwd;
	private $db_handle=null;

	public function __construct($id=0, $name=""){
      $this->setId($id);
      $this->setName($name);

      $db = new DbManager();
      $this->db_handle = $db->connectToDb();
	}

	/* mutators */
    public function setId($id){
    	$this->id = $id;
    	return $this;
    }

    
    public function setPassword($pd){
    	$this->pwd = $pd;
    	return $this;
    }

    public function setName($nam){
    	$this->name = $nam;
    	return $this;
    }

	/* accessors */
    public function getId(){
    	return $this->id;
    }

    public function getPassword(){
    	return $this->pwd;
    }

    public function getName(){
    	return $this->name;
    }

    public function save(){
    	$saved = false;
    	$query = "insert into users (pwd, name) values(?, ?)";

    	try{

    		$this->db_handle->beginTransaction();
            $stmt = $this->db_handle->prepare($query);

            $user_details = array($this->getPassword(), $this->getName());
            $stmt->execute($user_details);
            
            if($stmt->rowCount()>0){
            	$saved=true;
            }
           
            $this->db_handle->commit();
    	}catch(PDOException $e){}

    	return $saved;
    }


    public function exists(){
    	$exists = false;
    	$query = "select * from users where name like ? and pwd like ?";

    	try{

    		$this->db_handle->beginTransaction();
            $stmt = $this->db_handle->prepare($query);

            $user_details = array($this->getName(), $this->getPassword());
            $stmt->execute($user_details);
            
            if($stmt->rowCount()>0){
            	$exists=true; #echo("found it");
            }
           
            $this->db_handle->commit();
    	}catch(PDOException $e){}

    	return $exists;
    }


    public function delete(){
    	$deleted = false;
    	$query = "delete from users where name like ? and pwd like ?";

    	try{

    		$this->db_handle->beginTransaction();
            $stmt = $this->db_handle->prepare($query);

            $user_details = array($this->getPassword(), $this->getName());
            $stmt->execute($user_details);
            
            if($stmt->rowCount()>0){
            	$deleted=true;
            }
           
            $this->db_handle->commit();
    	}catch(PDOException $e){}

    	return $deleted;
    }



	public function __destruct(){}

}


?>