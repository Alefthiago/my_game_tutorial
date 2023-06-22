<?php

$dbName =  "projetoepratica";
$port = 3307; // se estiver no if altere a porta para 3307
$user = "root";
$senha = "root";

$name = "alefffaff";
$email = "alesffafff@gmail.com";
$userName = "alefaffff";
$pass = sha1("1234");

$pdo = new PDO("mysql:dbname=$dbName;host=127.0.0.1;port=$port" , "$user", "$senha");
$sql = "INSERT INTO users (user_name, user_email, user_username, user_password) VALUES (:name, :email, :userName, :pass)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":userName", $userName);
    $stmt->bindParam(":pass", $pass);
    $stmt->execute();
    $response['token'] = generateToken([
        'sub' => $email,
        'user' => $userName
    ]);
    echo json_encode($response);
} catch (PDOException $e) {
    if (strpos($e->errorInfo[2], "users.email_UNIQUE") !== false) {
        echo "users.email_UNIQUE";
    } 
    
    if(strpos($e->errorInfo[2], "users.username_UNIQUE") !== false) {
        echo "users.username_UNIQUE";
    }
} finally {
    $pdo = null;
}

?>