<?php
require 'includes/config.php';
$url = $_POST['url'];
$keyword = $_POST['keyword'];

$urlSet = isset($url);
$keywordSet = isset($keyword);

$urlNotNullString = ($url != '');
$keywordNotNullString = ($keyword != '');

if($urlSet && $keywordSet && $keywordNotNullString) {

    $flag = 0;

    include 'includes/UrlShortener.php';

    $servername = DB_HOST;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $dbname = DB_NAME;


    try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('SELECT short_code FROM urls WHERE short_code=:keyword');
            $stmt->execute(['keyword'=>$keyword]); // specifying what the variable is above
            $results = $stmt->fetch();

            if(!$results) // This Keyword is not reserved for anybody
            {
                $flag = 1;
            }
            else // This Keyword is Reserved
            {
                $flag = 0;
            }
    } catch (PDOException $e){
            print_r($myfile, ($e->getMessage()));
    }

    $conn = null;

    if($flag == 1) {
        $short = new UrlShortener();
        $short_code = $short->insertWithOutGenerating($url, $keyword);
        //echo '$short_code';
        $msg['short'] = ($short_code == 'invalid') ? 'invalid' : SITEURL . $short_code;
        echo json_encode($msg);
    } else {
        $msg['short'] = 'k';
        echo json_encode($msg);
    }

} else if($urlSet){

    $url = $_POST['url'];

    include 'includes/UrlShortener.php';
    $short = new UrlShortener();
    $short_code = $short->insertInDb($url);
    //echo '$short_code';
    $msg['short'] = ($short_code == 'invalid') ? 'invalid' : SITEURL . $short_code;
    echo json_encode($msg);
}