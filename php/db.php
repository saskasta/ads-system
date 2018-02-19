<?php
include_once(dirname(__FILE__)."\Database.php");

include_once(dirname(__FILE__)."\User.php");
include_once(dirname(__FILE__)."\Ad.php");



define('DB_TYPE', 'mysql');
define('DB_HOST', "localhost");
define('DB_NAME', "ads_base");
define('DB_USER', 'root');
define('DB_PASS', 'root');

$sessName = session_name('ads');
session_start();




$users = new User(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);
$ads = new Ad(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);


