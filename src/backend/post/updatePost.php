<?php

require '../ConnBd.php';

$dbName = "projetoepratica";
$port = 3306; //mudar para 3307 caso esteja no IF
$user = "root";
$pass = "root";

//$pdo = new PDO("mysql:dbname=$dbName;host=127.0.0.1;port=$port",$user,$pass );

$postId = 2;
$newTitle = "novo título";
$newContent = "novo asdasidow";
$newLink = "novo aosdosaid";


$sql = "UPDATE posts SET post_title = :title, post_content = :content, post_link = :link WHERE post_id = :postId";


try {
    $stmt = $connBd->getConnection()->prepare($sql);
//    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":title",$newTitle);
    $stmt->bindParam(":content",$newContent);
    $stmt->bindParam(":link",$newLink);
    $stmt->bindParam(":postId",$postId);
    $stmt ->execute();

    echo "Dados atualizados";

} catch (PDOException $e) {

    //tratar erro
    echo "Erro" . $e->getMessage();

} finally {
    $stmt = null;
    $connBD->closed;
//    $pdo = null;
}

?> 