<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Authentication');
require '../functions.php';
require '../ConnBd.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_SERVER['HTTP_AUTHENTICATION'])) {
        unauthorized();
    }
    $tokenParts = explode(' ', $_SERVER['HTTP_AUTHENTICATION']);
    if (sizeof($tokenParts) != 2) {
        unauthorized();
    }
    
    $token = $tokenParts[1];
    if (!validateToken($token)) {
        unauthorized();
    }
}

