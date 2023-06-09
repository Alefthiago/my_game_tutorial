<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');

require '../functions.php';
require '../ConnBd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (!isset($data)) {
        unauthorized();
    }

    $email = $data['email'];
    $name = $data['name'];
    $userName = $data['userName'];
    $pass = sha1($data['password']); // depois mudar a criptografia para SHA-256

    $sql = 'INSERT INTO users (user_name, user_email, user_username, user_password) VALUES (:name, :email, :userName, :pass)';
    try {
        $statement = $connBD->getConnection()->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':userName', $userName);
        $statement->bindParam(':pass', $pass);
        $statement->execute();

        $getId = "SELECT user_id, user_email, user_username FROM users WHERE user_email = :email";
        $getIdStatement = $connBD->getConnection()->prepare($getId);
        $getIdStatement->bindParam(':email', $email);
        $getIdStatement->execute();
        $result = $getIdStatement->fetch(PDO::FETCH_ASSOC);
        $response['token'] = generateToken([
            'sub' => $result['user_id'],
            'email' => $result['user_email'],
            'username' => $result['user_username']
        ]);
        echo json_encode($response);
    } catch (PDOException $exception) {
        if (strpos($exception->errorInfo[2], 'users.email_UNIQUE') !== false) {
            $error['error'] = 'E-mail já cadastrado!';
            echo json_encode($error);
        }

        if (strpos($exception->errorInfo[2], 'users.username_UNIQUE') !== false) {
            $error['error'] = 'Nome de usuário já cadastrado!';
            echo json_encode($error);
        }
    } finally {
        $statement = null;
        $getIdStatement = null;
        $connBD->closeConnection();
    }
}
