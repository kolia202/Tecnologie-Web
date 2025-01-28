<?php

require_once("db/database.php");    
session_start();
$dbhost = new DatabaseHelper("localhost", "root", "", "morbidoso", "3306");   

?>