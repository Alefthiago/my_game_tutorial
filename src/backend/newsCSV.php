<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $file = "csv/news.csv";
    $fp = fopen($file, "r");
    if ($fp) {
        $news = [];
        while (($row = fgetcsv($fp)) !== false) {
            $rowAssociative = [
                    'img' => $row[0],
                    'title' => $row[1],
                    'summary' => $row[2],
                    'link' => $row[3]
            ];
            $news[] = $rowAssociative;
        }
        fclose($fp);
        echo json_encode($news);
    }
}
