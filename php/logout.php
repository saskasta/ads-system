<?php
include_once(dirname(__FILE__)."\db.php");

unset($_SESSION);
session_destroy();
header("Location: ../home.php");
die();