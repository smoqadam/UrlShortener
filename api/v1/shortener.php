<?php
/**
 * Created by PhpStorm.
 * User: cotint
 * Date: 10/10/17
 * Time: 10:00 AM
 */

include '../../includes/config.php';
$url = json_decode(file_get_contents('php://input'), true)['url'];

if($url != null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../../includes/UrlShortener.php';

    $short = new UrlShortener();
    $short_code = $short->insertInDb($url) ;
    //echo '$short_code';
    $msg['short'] = ($short_code == 'invalid') ? 'invalid' : SITEURL.$short_code;

    echo json_encode($msg, JSON_UNESCAPED_SLASHES);
}