<?php 

// // configuração do banco de dados

$dbName =  "projetoepratica";
$port = 3306; // se estiver no if altere a porta para 3307
$user = "root";
$senha = "root";

 $pdo = new PDO("mysql:dbname=$dbName;host=127.0.0.1;port=$port" ,"$user","$senha");

 //OBS: apesar de ter coisas ae q não seja obrigatório recomendo deixar do jeito q está para evitar erros 

?>