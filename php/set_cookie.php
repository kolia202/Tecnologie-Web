<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$expireTime = time() + (30 * 24 * 60 * 60); 
setcookie("consenso_cookie", "accettato", $expireTime, "/");

echo json_encode(["status" => "success"]);
?>
