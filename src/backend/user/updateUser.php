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

    if (!validateToken($data['token'])) {
        unauthorized();
    }

    $tokenData = getTokenData($data['token']);
    $id = $tokenData['sub'];
    $email = $data['email'];
    $name = $data['name'];
    $userName = $data['userName'];
    $pass = sha1($data['pass']);

    $sql = 'UPDATE users SET user_name = :new_name, user_email = :new_email, user_username = :new_username WHERE user_id = :user_id and user_password = :user_password';

    try {
        $statement = $connBD->getConnection()->prepare($sql);
        $statement->bindParam(':new_name', $name);
        $statement->bindParam(':new_email', $email);
        $statement->bindParam(':new_username', $userName);
        $statement->bindParam(':user_id', $id);  // Vincula o ID do usuário
        $statement->bindParam(':user_password', $pass);  // Vincula a senha do usuário
        $statement->execute();
        $rowCount = $statement->rowCount();

        if ($rowCount == 0) {
            http_response_code(404);
        }
    } catch (PDOException $exception) {
        echo json_encode(['error' => $exception->getMessage()]);
    } finally {
        $statement = null;
        $connBD->closeConnection();
    }
}
