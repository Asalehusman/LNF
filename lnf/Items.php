<?php
 
 include_once("Item.php"); 
 include_once("database/DbManager.php");


 class Items{
 	private $db_handle = null;
    
    public function __construct(){
    	$db = new DbManager();
    	$this->db_handle = $db->connectToDb();
    }
    
    public function getAll($limit=50, $offset=0){
    	$query = "select id from items limit $limit offset $offset";
    	$items = array();

    	try{
    		$this->db_handle->beginTransaction();
            
            $stmt = $this->db_handle->prepare($query);
            $stmt->execute();

            $ids = $stmt->fetchAll(PDO::FETCH_ASSOC);

    		$this->db_handle->commit();

    	}catch(PDOException $e){ }
        #echo(count($ids));
        #var_dump($ids);
    	if(count($ids) > 0){
    		foreach($ids as $id){
    			#echo("id: ". $id['id']);
    			$item = new Item($id['id'], "");
    			$item->setId($id['id']);
    			$props = $item->setProperties()
    			              ->getProperties();

    			array_push($items, $props);

    		}
    	}

    	return $items;
    }

    public function getByCategory($cat){
    	$items = array();
    	$query = "select id from items where category like ?";

    	try{
          $this->db_handle->beginTransaction();
          
          $stmt = $this->db_handle->prepare($query);
          $stmt->execute(array($cat));

          $ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
          $this->db_handle->commit();
    	}catch(PDOException $e){}

    	if(count($ids) > 0){
    		foreach($ids as $id){
    			#echo("id: ". $id['id']);
    			$item = new Item($id['id'], "");
    			$item->setId($id['id']);
    			$props = $item->setProperties()
    			              ->getProperties();

    			array_push($items, $props);

    		}
    	}

    	return $items;
    }

     public function getByName($nam){
        $items = array();
        $query = "select id from items where name like ?";

        try{
          $this->db_handle->beginTransaction();
          
          $stmt = $this->db_handle->prepare($query);
          $stmt->execute(array($nam));

          $ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
          $this->db_handle->commit();
        }catch(PDOException $e){}

        if(count($ids) > 0){
            foreach($ids as $id){
                #echo("id: ". $id['id']);
                $item = new Item($id['id'], "");
                $item->setId($id['id']);
                $props = $item->setProperties()
                              ->getProperties();

                array_push($items, $props);

            }
        }

        return $items;
    }

    public function __destruct(){
    	$this->db_handle=null;
    }
 }


?>