<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");

echo json_encode(["cookieSet" => isset($_COOKIE["consenso_cookie"]) ? true : false]);
?>
