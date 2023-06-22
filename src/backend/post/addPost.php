<?php

$dbName =  "projetoepratica";
$port = 3306; // se estiver no if altere a porta para 3307
$user = "root";
$senha = "root";

$title = "alef";
$content = "aasdadnkajsdbaskjdjksadjkhdashdjkaskd";
$link = "alef";
$userId = 1;

$pdo = new PDO("mysql:dbname=$dbName;host=127.0.0.1;port=$port" , "$user", "$senha");
$sql = "INSERT INTO posts (post_title, post_content, post_link, users_user_id) VALUES (:title, :content, :link, :userId)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":content", $content);
    $stmt->bindParam(":link", $link);
    $stmt->bindParam(":userId", $userId);
    $stmt->execute();
    //$response['token'] = generateToken([
      //  'sub' => $email,
      //  'user' => $userName
   // ]);
   // echo json_encode($response);
} catch (PDOException $e) {
    var_dump($e->getMessage());

   // if (strpos($e->errorInfo[2], "users.email_UNIQUE") !== false) {
   //     echo "users.email_UNIQUE";
  //  } 
    
 //   if(strpos($e->errorInfo[2], "users.username_UNIQUE") !== false) {
 //       echo "users.username_UNIQUE";
 //   }
} finally {
    $pdo = null;
}

?>