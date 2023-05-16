<?php
    header('Access-Control-Allow-Origin: http://localhost:8080');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: Authorization');

    require 'functions.php';
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
        if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
            unauthorized();
        }
    
        $tokensParts = explode (' ',$_SERVER['HTTP_AUTHORIZATION']);
        if (sizeof($tokensParts) != 2) {
            unauthorized();
        }
        $token = $tokensParts[1];
        
        if (!validateToken($token)) {
            unauthorized();
        }

        $data = getTokenData($token);
        echo json_encode($data['type']);
    }