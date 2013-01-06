<?php

include 'includes/config.php';
include 'includes/UrlShortener.php';

$short = new UrlShortener();

$url = $short->getUrl($_GET['url']);
if(empty($url))
{
	echo '<h1>404 Not Found</h1><br><a href="'.SITEURL.'">Back To Main Page</a>';
}else
{
	$short->addCount($url);
	header('Location:'.$url);
}

