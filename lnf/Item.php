<?php

include("database/DbManager.php");

class Item{
  public $id, $name, $category, $status, $description;
  private $db_handle;

  public function __construct($id=0, $name=""){
    $this->id = $id;
    $this->name = $name;

    $db = new DbManager();
    $this->db_handle = $db->connectToDb();
  }   
  

  /* mutators */
  public function setId($id){
     $this->id = $id;
     return $this;
  }

  public function setName($name){
     $this->name = $name;
     return $this;
  }

  public function setCategory($cat){
     $this->category = $cat;
     return $this;
  }

   public function setDescription($des){
     $this->description = $des;
     return $this;
  }


  public function setStatus($sts){
     $this->status = $sts;
     return $this;
  }

  


  /* accessors */
  public function getId(){
     return $this->id;
  }


  public function getName(){
     return $this->name;
  }


  public function getCategory(){
     return $this->category;
  }

  public function getDescription(){
     return $this->description;
  }


  public function getStatus(){
     return $this->status;
  }




  
 public function __destruct(){}
 
 public function setProperties(){
   $query = "select * from items where id = ?";

   try{
    $this->db_handle->beginTransaction();
  
    $stmt = $this->db_handle->prepare($query);
    $stmt->execute(array($this->getId()));
    
    $props = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->setName($props['name']);
    $this->setCategory($props['category']);
    $this->setDescription($props['description']);
    #$this->setName($props['name']);
  
    $this->db_handle->commit();
   }catch(PDOException $e){ }

   return $this;
 }

 public function getProperties(){
  $props = array();

  $props['id'] = $this->getId();
  $props['name'] = $this->getName();
  $props['desc'] = $this->getDescription();
  $props['cat'] = $this->getCategory();

  return $props;
 }

 public function save(){
    $saved=false;
    $query = "insert into items (name, category, description, date_added) values(?, ?, ?, 'DATE()')";

    try{
       $this->db_handle->beginTransaction();
       $stmt = $this->db_handle->prepare($query);
       
       $item_data = array($this->getName(), $this->getCategory(), $this->getDescription());

       $stmt->execute($item_data);

       if($stmt->rowCount()>0){
          $saved = true;
       }

       $this->db_handle->commit();
    }catch(PDOException $e){
      echo($e->getMessage());
    }

    return $saved;
   
 }

 public function delete(){
    $query = "delete from items where id = ?";

    try{
      $this->db_handle->beginTransaction();
      
      $this->db_handle->prepare($query)->execute(array($this->getId()));

      $this->db_handle->commit();
    }catch(PDOException $e){}
 }

 public function exists(){
    $exists = false;
    $query = "select * from items where name like ?";

    try{
      $this->db_handle->beginTransaction();
      
      $stmt = $this->db_handle->prepare($query);
      $stmt->execute(array($this->getName()));

      if($stmt->rowCount()>0){
        $exists=true;
      }

      $this->db_handle->commit();
    }catch(PDOException $e){}

    return $exists;
 }


 public function claimed(){
 
 }
 };
?>