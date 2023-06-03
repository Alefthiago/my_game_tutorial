<?php
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require "../token/functions.php";
require "../conn.php";

$sql = $pdo->query("SELECT  user_email,user_username  FROM users;");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (!isset($data)) {
        unauthorized();
    }

    $response = array();
    if ($sql->rowCount() > 0) {
        $users  = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            if ($user['user_email'] == $data['email']) {
                $response = array(
                    'invalidEmail' => true,
                    'invalidUser' => false
                );
                echo json_encode($response);
                exit();
            } else if ($user['user_username'] == $data['userName']) {
                $response = array(
                    'invalidEmail' => false,
                    'invalidUser' => true
                );
                echo json_encode($response);
                
                exit();
            }
        }

            $name = $data['name'];
            $email = $data['email'];
            $userName = $data['userName'];
            $password =  $data['password'];

            $insert = "INSERT INTO users  VALUES(DEFAULT,'$name','$email','$userName','$password',DEFAULT)";
            $pdo->exec($insert);
    }
}
