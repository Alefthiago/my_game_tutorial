<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');

require '../functions.php';
require '../ConnBd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty(array_filter($_POST))) {
        unauthorized();
    }
    if (!validateToken($_POST['token'])) {
        unauthorized();
    }
    $forbiddenWordsFile = 'filter.txt';
    $forbiddenWords = file($forbiddenWordsFile, FILE_IGNORE_NEW_LINES);

    $content = $_POST['content'];
    foreach ($forbiddenWords as $word) {
        if (stripos($content, $word) !== false) {
            die("Conteúdo proibido encontrado!");
        }
    }

    $tag = $_POST['tag'];
    $file = $_FILES['file'];
    $fileType = !empty($file) ? current(explode("/", $file['type'])) : null;
    $token = getTokenData($_POST['token']);
    $id = $token['sub'];
    $userName = $token['username'];
    $folder = 'dataPost/';
    $tempFileName = $file['name'];
    $fileName = uniqid();
    $extension = strtolower(pathinfo($tempFileName, PATHINFO_EXTENSION));
    move_uploaded_file($file['tmp_name'], $folder . $fileName . "." . $extension);
    if($file) {
        $filePath = $fileName . "." . $extension;
    } else {
        $filePath = null;
    }
    
    $sql = "INSERT INTO posts (post_tag, post_content, post_path_file, post_file_type, users_username, users_user_id) VALUES (:tag, :content, :path_file, :file_type, :users_username, :userId)";

    try {
        $stmt = $connBD->getConnection()->prepare($sql);
        $stmt->bindParam(":tag", $tag);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":path_file", $filePath);
        $stmt->bindParam(":file_type", $fileType);
        $stmt->bindParam(":userId", $id);
        $stmt->bindParam(":users_username", $userName);
        $stmt->execute();
        
        if (!empty($file)) {
            $save = move_uploaded_file($file['tmp_name'], $folder . $fileName . "." . $extension);
        }
    } catch (PDOException $e) {
        echo var_dump($e->getMessage());
    } finally {
        $stmt = null;
        $connBD->closeConnection();
    }
}
