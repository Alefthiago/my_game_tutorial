<?php 
    header("Access-Control-Allow-Origin: http://localhost:8080");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    require "../token/functions.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        if (!isset($data)) {
            unauthorized();
        }

        $file = "../csv/users.csv";
        $fp = fopen($file, 'r');
        
        $response = array();
        if ($fp) {
            while(($row = fgetcsv($fp)) !== false) {
                if ($row[0] == $data['email']) {
                    $response = array(
                        'invalidEmail' => true,
                        'invalidUser' => false
                    );
                    echo json_encode($response);
                    fclose($fp);
                    exit();
                } else if ($row[2] == $data['userName']) {
                    $response = array(
                        'invalidEmail' => false,
                        'invalidUser' => true
                    );
                    echo json_encode($response);
                    fclose($fp);
                    exit();
                }
            };
            fclose($fp);            
            $fp = fopen($file, 'a');
            fputcsv($fp, [$data['email'], $data['name'], $data['userName'], $data['password'], 'default']);
            fclose($fp);
        }
    }
?>
