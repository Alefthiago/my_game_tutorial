<?php

require '../ConnBd.php';

$dbName = "projetoepratica";
$port = 3306; //mudar para 3307 caso esteja no IF
$user = "root";
$pass = "root";

//$pdo = new PDO("mysql:dbname=$dbName;host=127.0.0.1;port=$port",$user,$pass );

$postId = 1;

$sql = "DELETE FROM posts WHERE post_id = :postId";

try {
    $stmt = $connBd->getConnection()->prepare($sql);
//  $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":postId",$postId);
    $stmt ->execute();

    echo "Post excluído";

} catch (PDOException $e) {

    //tratar erro
    echo "Erro" . $e->getMessage();

} finally {
    $stmt = null;
    $connBD->closed;
//  $pdo = null;
}

?> 