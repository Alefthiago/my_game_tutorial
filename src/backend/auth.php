<?php
    header('Access-Control-Allow-Origin: http://localhost:8081');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $json = file_get_contents('php://input');
        $dados = json_decode($json, true);
        $dadosUser = array(
            "email" => $dados["email"],
            "senha" => $dados["senha"],
        );

        if (!empty($dados["email"]) && !empty($dados["senha"])) {
            $arquivo = "csv/users.csv";
            $fp = fopen($arquivo, "r");
            if ($fp) {
                while (($row = fgetcsv($fp)) !== false) {
                    if ($row[0] === $dados["email"] && $row[1] === $dados["senha"]) {
                        $dadosUser["token"] = 14035558427;                        
                        break;   
                    }
                }
            }
            fclose($fp);
            echo json_encode($dadosUser);
        }
    }
