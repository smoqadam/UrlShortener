<?php
		
include 'includes/config.php';

if(isset($_POST['url'])) {
	$url = $_POST['url'];
	include 'includes/UrlShortener.php';
	$short = new UrlShortener();
	$short_code = $short->insertInDb($url) ; 
	//echo '$short_code';
	$msg['short'] = ($short_code == 'invalid') ? 'invalid' : SITEURL.$short_code;
	echo json_encode($msg);	
}
