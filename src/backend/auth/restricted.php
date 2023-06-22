<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
require '../functions.php';
    
$tokenParts = explode(' ', $_SERVER['HTTP_AUTHORIZATION']);
echo $tokenParts;  

    $token = $tokenParts[1];

