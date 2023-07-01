<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');
require '../functions.php';
require '../ConnBd.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT p.*, u.user_username AS post_author
      FROM posts p
    INNER JOIN users u ON p.users_user_id = u.user_id
     ORDER BY post_date DESC";

    try {
        $statement = $connBD->getConnection()->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    } finally {
        $stmt = null;
        $connBD->closeConnection();
    }
}
?>
