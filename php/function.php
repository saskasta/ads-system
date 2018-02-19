<?php
include_once(dirname(__FILE__)."\db.php");
$userAgent     =   $_SERVER['HTTP_USER_AGENT'];
  
if(isset($_POST['register']) && $_POST['register']=="Yes"){
    if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
           !empty($_POST['phone']) && !empty($_POST['password']) ){
      
        $data = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => md5($_POST['password']),
            'ip_address' => getIpAddr(),
            'os_system' => getOS(),
            'browser' => getBrowser()
        ];
        $id = $users->insertUser($data);
        if(!empty($id)){
             header("Location: ../msg.php?msg=add");
             die();
        }
        else{
             header("Location: ../msg.php?msg=error");
             die();
        }
       
    }
}else if(isset($_POST['login']) && $_POST['login']=="Yes"){
     if(!empty($_POST['email']) && !empty($_POST['password'])){
           $email = $_POST['email'];
           $password = md5($_POST['password']);
           $user = $users->getUser($email, $password);
           if(!empty($user)){
                $_SESSION['Id'] = $user['id'];
                $_SESSION['user_name'] = $user['name']." ".$user['surname'];
                header("Location: ../home.php");
                die();
           }
           else{
               header("Location: ../login.php");
                die();
           }
     }
}else if(isset($_POST['new_ad']) && $_POST['new_ad']=="Yes"){
     if(!empty($_POST['user_id']) && !empty($_POST['title']) && !empty($_POST['desc'])){
         $data = [
             'user_id' => $_POST['user_id'],
             'title' => $_POST['title'],
             'desc' => $_POST['desc'],
             'photo' => '',
             'ip_address' => getIpAddr(),
             'os_system' => getOS(),
             'browser' => getBrowser()
         ];
         $adId = $ads->insertAd($data);
      
         if(!empty($adId)){
             $dest  = uploadFile($_FILES['photo'], $adId);
             if($dest){
                $ads->updatePhoto($dest, $adId);
             } 
             
            header("Location: ../home.php");
            die();
         }
         
     }
  
     header("Location: ../create-ad.php");
     die();
    
      
}




function getIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

 function uploadFile($file, $adId){
        $upload = "../imgs/";
        if(!empty($file["name"]) && $file['error'] == 0 && $file['size'] > 0 && $file['size'] < 2* 1024 * 1024){
            $allowedExts = array("png", "jpg", "jpeg"); 
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            if(in_array($extension, $allowedExts )){
                $newFile = "img_".$adId."_".basename($file['name']);
                $destination = $upload.$newFile;
                move_uploaded_file($file['tmp_name'],$destination); 
                return $newFile;
            }     
        }
        return "";
}


//lists find on internet,
function getOS() { 
    global $userAgent;
    $os    =   "Unknown OS System";
    $osArray       =  [
                            '/windows nt 10.0/i'    =>  'Windows 10',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        ];

    foreach ($osArray as $key => $value) { 
        if (preg_match($key, $userAgent)) {
            $os    =   $value;
        }
    }   
    return $os;

}

function getBrowser() {
    global $userAgent;
    $browser   =   "Unknown Browser";
    $browserArray  =   [
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        ];

    foreach ($browserArray as $key => $value) { 
        if (preg_match($key, $userAgent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}





