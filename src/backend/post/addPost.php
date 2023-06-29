<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');

require '../functions.php';
require '../ConnBd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // if (empty(array_filter($_POST))) {
    //     unauthorized();
    // }
    // if (empty(array_filter($_FILES))) {
    //     unauthorized();
    // }
    // if (!validateToken($_POST['token'])) {
    //     unauthorized();
    // }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $file = $_FILES['file'];
    $token = getTokenData($_POST['token']);
    $email = $token['sub'];
    $folder = 'dataPost/';
    $tempFileName = $file['name'];
    $fileName = uniqid();
    $extension = strtolower(pathinfo($tempFileName, PATHINFO_EXTENSION));

    $filteredContent = $content;
    $forbiddenWords = file('/filter.txt', FILE_IGNORE_NEW_LINES);
    foreach ($forbiddenWords as $word) {
        if (stripos($filteredContent, $word) !== false) {
            die("A postagem contém palavras proibidas. A publicação foi bloqueada.");
        }
    }
    
    $save = move_uploaded_file($file['tmp_name'], $folder . $fileName . "." . $extension);
    
    // $sql = "INSERT INTO posts (post_title, post_content, post_link, users_user_id) VALUES (:title, :content, :link, :userId)";

    // try {
    //     $stmt = $connBD->getConnection()->prepare($sql);
    //     $stmt->bindParam(":title", $title);
    //     $stmt->bindParam(":content", $filteredContent);
    //     $stmt->bindParam(":link", $link);
    //     $stmt->bindParam(":userId", $userId);
    //     $stmt->execute();
    // } catch (PDOException $e) {
    //     var_dump($e->getMessage());
    // } finally {
    //     $stmt = null;
    //     $connBD->closeConnection();
    // }
}
