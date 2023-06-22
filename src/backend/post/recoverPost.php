<?php

require '../ConnBd.php';

$dbName = "projetoepratica";
$port = 3306; //mudar para 3307 caso esteja no IF
$user = "root";
$pass = "root";

//$pdo = new PDO("mysql:dbname=$dbName;host=127.0.0.1;port=$port",$user,$pass );

$sql = "SELECT * FROM posts ORDER BY post_date DESC";

try {
    $stmt = $connBd->getConnection()->prepare($sql);
//  $stmt = $pdo->prepare($sql);
    $stmt ->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    //exibir
    foreach ($result as $row) {
        echo "título:" . $row['post_title'] . "<br>";
        echo "conteúdo:" . $row['post_content'] . "<br>";
        echo "link:" . $row['post_link'] . "<br>";
        echo "data:" . $row['post_date'] . "<br>";
        echo "<br>";

    }

} catch (PDOException $e) {

    //tratar erro
    echo "Erro" . $e->getMessage();

} finally {
   $stmt = null;
   $connBD->closed;
//  $pdo = null;
}

?>