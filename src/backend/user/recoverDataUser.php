<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');
require '../functions.php';
require '../ConnBd.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $token = $_GET['token'];

    if(!validateToken($token)) {
        unauthorized();
    }
    
    $data = getTokenData($token);
    $email = $data['sub'];

    $sql = 'SELECT user_id, user_name, user_email, user_username FROM users WHERE user_email = :email';

    try {
        $statement = $connBD->getConnection()->prepare($sql);
        $statement->bindParam(':email', $email);    
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch(PDOException $exception) {
        echo "alo";
    } finally {
        $statement = null;
        $connBD->closeConnection();
    }
}
