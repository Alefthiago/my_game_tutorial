<?php
    header('Access-Control-Allow-Origin: http://localhost:8080');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');
    require 'functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        $response = [];
        if (!empty($data["email"]) && !empty($data["password"])) {
            $arquivo = "../csv/users.csv";
            $fp = fopen($arquivo, "r");
            if ($fp) {
                while (($row = fgetcsv($fp)) !== false) {
                    if ($row[0] === $data["email"] && $row[3] === $data["password"]) {
                        $response['token'] = generateToken([
                            'sub' => $row[0],
                            'user' => $row[2],
                            'type' => $row[4]
                        ]);
                        break;   
                    }
                }
            }
            fclose($fp);
            echo json_encode($response);
        }
    }
