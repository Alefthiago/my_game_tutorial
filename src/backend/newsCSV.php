<?php
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $file = "csv/news.csv";
    $fp = fopen($file, "r");
    if ($fp) {
        $news = [];
        while (($row = fgetcsv($fp)) !== false) {
            $rowAssociative = [
                    "title" => $row[0],
                    "content" => $row[1],
                    "author" => $row[2],
                    "date" => $row[3],
                    "id" => $row[4]
            ];
            $news[] = $rowAssociative;
        }
        fclose($fp);
        echo json_encode($news);
    }
}
