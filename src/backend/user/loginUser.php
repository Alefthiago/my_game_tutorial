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

    $emailOrUser = $data['emailOrUser'];
    $pass = sha1($data['password']);

    $sql = 'SELECT user_email, user_username FROM users WHERE (user_email = :emailOrUser OR user_username = :emailOrUser) AND user_password = :pass';

    try {
        $statement = $connBD->getConnection()->prepare($sql);
        $statement->bindParam(':emailOrUser', $emailOrUser);
        $statement->bindParam(':pass', $pass);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (empty($result)) {
            $error['error'] = 'Dados inválidos!';
            echo json_encode($error);
        } else {
            $response['token'] = generateToken([
                'sub' => $result['user_email'],
                'user' => $result['user_username']
            ]);
            echo json_encode($response);
        }
    } catch (PDOException $exception) {
        $error['error'] = $exception->getMessage();
        echo json_encode($error);
    } finally {
        $statement = null;
        $connBD->closeConnection();
    }
}
