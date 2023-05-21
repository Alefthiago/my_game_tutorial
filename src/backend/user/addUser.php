<?php 
    header("Access-Control-Allow-Origin: http://localhost:8080");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    require "token/functions.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        if (!isset($data)) {
            unauthorized();
        }

        $file = "../csv/news.csv";
        $fp = fopen($file, 'r');
        
        if ($fp) {
            while(($row = fgetcsv($fp)) !== false) {
                if ($row[0] == $data['email'] or $row[2] == $data['user']) {
                    http_response_code(409);
                    exit();
                }
            }
            
            fclose($fp);
            $fp = fopen($file, 'a');
            fputcsv($fp, [$data['email'], $data['name'], $data['username'], $data['password']]);
        }
    }