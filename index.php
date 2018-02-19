<?php

 if(!empty($_SESSION['Id'])){
     header("Location: home.php");
     die();
 }
else{
     header("Location: home.php"); //I put the same, but we can put login.php if dont want to users see ads before login fore example
     die();
}