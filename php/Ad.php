<?php

class Ad extends Database{
    
    
    public function all(){
        $sql = "SELECT `id`, `title`, `desc`, `photo` FROM `ads` ORDER BY `id` DESC LIMIT 10";
        return $this->getAll($sql);
    }
    
    public function getById($id){
        $sql = "SELECT ads.title, ads.desc,ads.photo, users.name, users.phone, users.email
                   FROM ads
                   INNER JOIN users ON ads.user_id = users.id
                   WHERE ads.id=".$id;
        return $this->getOne($sql);
    }
    public function getByUserId($userId){
        $sql = "SELECT `id`, `title`, `desc`, `photo` FROM ads WHERE user_id=".$userId." ORDER BY `id` DESC";
        return $this->getAll($sql);
    }
    
    
    public function insertAd($data)
    { 
        $title= $data['title'];
        $desc = $data['desc'];
        $userId = $data['user_id'];
        $photo = $data['photo'];
        $ip = $data['ip_address'];
        $os =$data['os_system'];
        $browser = $data['browser'];
        $query = "INSERT INTO ads (`title`, `desc`, `user_id`, `photo`, ip_address,`os_system`, `browser`)
                  VALUES ('$title','$desc', '$userId','$photo', '$ip','$os','$browser')";
      
        return $this->save($query);
    }
    
    public function updatePhoto($photo, $id){
        $query = "UPDATE ads SET photo='$photo' WHERE id=".$id;
        $this->exec($query);
    }
}


 