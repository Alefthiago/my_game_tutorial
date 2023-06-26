<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');

require '../functions.php';
require '../ConnBd.php';



if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (!isset($data)) {
        unauthorized();
    }
    if (!validateToken($data['token'])) {
        unauthorized();
    }
    
    $sql = "INSERT INTO posts (post_title, post_content, post_link, users_user_id) VALUES (:title, :content, :link, :userId)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":link", $link);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    
    } finally {
        $stmt = null;
        $connBD->closeConnection();
    }

}

?>