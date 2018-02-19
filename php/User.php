<?php

class User extends Database{
    public function getUser($email, $password){
         $sql="SELECT * FROM users WHERE email = '$email' and password = '$password'";
         return $this->getOne($sql);
    }
  
    
    public function insertUser($data)
    { 
         
        $name= $data['name'];
        $surname = $data['surname'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password =$data['password'];
        $ip = $data['ip_address'];
        $os =$data['os_system'];
        $browser = $data['browser'];
        $query = "INSERT INTO users (`name`, `surname`, `email`, `phone`,`password`, ip_address,`os_system`, `browser`)
                  VALUES ('$name', '$surname','$email','$phone','$password', '$ip','$os','$browser')";
        $this->exec($query);
        return $this->lastInsertId();
    }
   
}
