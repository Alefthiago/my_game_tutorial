<?php

header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');
require 'functions.php';
require "../conn.php";

$sql = $pdo->query("SELECT user_email, user_username, user_password  FROM users;");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $response = [];
    if (!empty($data["emailOrUser"]) && !empty($data["password"])) {
        if ($sql->rowCount() > 0) {
            $users  = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users as $user) {
                if (($user['user_email'] == $data['emailOrUser'] || $user['user_username'] == $data['emailOrUser']) && $user['user_password'] === $data['password']) {
                    $response['token'] = generateToken([
                        'sub' => $user['user_email'],
                        'user' => $user['user_username'],
                        'type' => $user['user_type']
                    ]);
                    break;
                }
            }
        }
        echo json_encode($response);
    }
}
