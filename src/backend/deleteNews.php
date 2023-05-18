<?php 
    header("Access-Control-Allow-Origin: http://localhost:8080");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    require "token/functions.php";
    
    if ($_SERVER['RESQUEST_METHOD'] == 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        if (!isset($data)) {
            unauthorized();
        }

        if (!validateToken($data['token'])) {
            unauthorized();
        }
        
        $copy = tempnam('csv/', '');
        $temp = fopen($copy, 'w');

        if ($temp) {
            $file = 'csv/news.csv';
            $orig = fopen($file, 'r');
            if ($orig) {
                while(($row = fgetcsv($orig)) !== false) {
                    if ($row[4] == $data['id']) {
                        continue;
                    }
                    fputcsv($temp, $row);
                }
            }
        }
        fclose($temp);
        fclose($orig);
        rename($copy, $file);
    }
