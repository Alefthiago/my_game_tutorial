<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');

require '../functions.php';
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
    $tokenData = getTokenData($data['token']);
    $postId = $tokenData['postId'];
    $newTitle = $data['newTitle'];
    $newContent = $data['newContent'];
    $newLink = $data['newLink'];

    $sql = "UPDATE posts SET post_title = :newTitle, post_content = :newContent, post_link = :newLink WHERE post_id = :postId";


    try {
        $stmt = $connBd->getConnection()->prepare($sql);
        $stmt->bindParam(":newTitle",$newTitle);
        $stmt->bindParam(":newContent",$newContent);
        $stmt->bindParam(":newLink",$newLink);
        $stmt->bindParam(":postId",$postId);
        $stmt ->execute();
        
        $rowCount = $stmt->rowCount();

        if ($rowCount == 0) {
            http_response_code(404);
        }
        

    } catch (PDOException $e) {

        echo json_encode(['error' => $e->getMessage()]);
        // echo "Erro" . $e->getMessage();

    } finally {
        $stmt = null;
        $connBD->closeConnection();
    }
    
}


?> 