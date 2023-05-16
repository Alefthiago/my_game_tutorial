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
        
        if (!validateToken($data['token'])) {
            unauthorized();
        } 

        $file = "csv/news.csv";
        $fp = fopen($file, 'a');
        
        if ($fp) {
            $payload = getTokenData($data['token']);

            date_default_timezone_set("America/Sao_Paulo");
            $date = date("F j, Y, H:i ");
            
            fputcsv($fp, [$data["title"], $data["content"], $payload['user'], $date, uniqid()]);
            fclose($fp);
        }
    }