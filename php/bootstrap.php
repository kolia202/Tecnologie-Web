<?php
session_start();
define("IMG_DIR", "../utilities/img/");
require_once("../utilities/functions.php");
require_once("../db/database.php"); 
$dbhost = new DatabaseHelper("localhost", "root", "", "morbidoso", 3306);   
?>