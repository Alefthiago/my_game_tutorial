<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
require 'functions.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);
if(!validateToken($data['token'])) {
    $error['error'] = 401;
    echo json_encode($error);
} else {
    echo "passou";
}