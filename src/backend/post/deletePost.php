<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');

require '../function.php';
require '../ConnBd.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if(!isset($data)) {
        unauthorized();
    }
    if(!validateToken($data['token'])) {
        unauthorized();
    }

    $postId = $data['postId'];

    $sql = "DELETE FROM posts WHERE post_id = :postId";

    try {

        $stmt = $connBd->getConnection()->prepare($sql);
        $stmt->bindParam(":postId",$postId);
        $stmt ->execute();

        echo "Post excluído";

    } catch (PDOException $e) {

        echo "Erro" . $e->getMessage();

    } finally {

        $stmt = null;
        $connBD->closeConnection();

    }

}




?> 