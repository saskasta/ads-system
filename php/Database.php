<?php
class Database extends PDO {

    public function __construct($dbtype, $dbhost, $dbname, $dbuser, $dbpass) {
        try{
          parent::__construct($dbtype.':host='.$dbhost.';dbname='.$dbname ,$dbuser, $dbpass);
        }catch(PDOException $ex){
              echo "Please try leter!";
               die();
       }
    }
    public function getAll($sql){
        $niz = array();
        $result = $this->query($sql);
        if($result->rowCount()>0){
            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $niz[] =$rs;
            }
        }  
        return $niz;   
    }
   
    public function getOne($sql){
           $niz = array();  
           $result = $this->query($sql);
            if($result->rowCount()>0){ 
                $niz = $result->fetch(PDO::FETCH_ASSOC);
            }
            return $niz;
    }
    
   
    public function save($sql){
        $prov = $this->exec($sql);
        if($prov){
            $ret = $this->lastInsertId();
        }else{
            $ret = 0;
        }
        return $ret;
    }
        
	
        
       
}   

