<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
    $json = file_get_contents('news.json');
    $data = json_decode($json, true);
    $newsList = array();
    for ($i = 0; $i <= 7; $i++) 
    {
        $news = array(
            'img' => $data['news_results'][$i]['thumbnail'],
            'game' => $data['news_results'][$i]['game'],
            'title' => $data['news_results'][$i]['title'],
            'link' => $data['news_results'][$i]['link']
        );
        $newsList[] = $news; // Adicione a notícia ao array $newsList
    }

    header('Content-Type: application/json');
    echo json_encode($newsList);
}
?>
