<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');
require '../functions.php';
require '../ConnBd.php';



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $token = $_GET['token'];

    if(!validateToken($token)) {
        unauthorized();
    }

    $data = getTokenData($token);
    
    $sql = "SELECT * FROM posts ORDER BY post_date DESC";

    try {
        $stmt = $connBd->getConnection()->prepare($sql);
        $stmt ->execute();
        
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        // foreach ($result as $row) {
        //     echo "título:" . $row['post_title'] . "<br>";
        //     echo "conteúdo:" . $row['post_content'] . "<br>";
        //     echo "link:" . $row['post_link'] . "<br>";
        //     echo "data:" . $row['post_date'] . "<br>";
        //     echo "<br>";
    
        // }
    
    } catch (PDOException $e) {

        echo "Erro" . $e->getMessage();
    
    } finally {

       $stmt = null;
       $connBD->closeConnection();

    }
}

?>