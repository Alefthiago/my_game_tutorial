<?php
header('Access-Control-Allow-Origin: http://localhost:8081');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

$json = file_get_contents('php://input');

$dados = json_decode($json, true);
$dadosUser = array( 
    "nome" => $dados["nome"],
    "idade" => $dados["idade"]
);
if (!empty($dados["nome"]) && !empty($dados["idade"])) {
    $arquivo = "csv/users.csv";
    $fp = fopen($arquivo, "a");
    fputcsv($fp, [$dados["nome"], $dados["idade"]]);
    fclose($fp);
    echo json_encode($dadosUser);
}
