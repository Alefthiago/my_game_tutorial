<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $arquivo = "csv/users.csv";
    $data = [];
    $fp = fopen($arquivo, "r");
    if ($fp) {
        while (($row = fgetcsv($fp)) !== false) {
            $linhaAssociativa = [
                "user" => array(
                    "email" => $row[0],
                    "name" => $row[1],
                    "senha" =>$row[2]
                )
            ];
            $data[] = $linhaAssociativa;
        }
        fclose($fp);
        echo json_encode($data);
    }
}
