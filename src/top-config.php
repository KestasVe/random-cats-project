<?php
$timezone = date_default_timezone_set('Europe/Vilnius');
$con = mysqli_connect('localhost', 'admin', '', 'cats_project');

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = trim($requestUri, '/');
$cachedFile = 'cache/cached-' . $requestUri . '.html';
$cacheTime = 60;

if (file_exists($cachedFile) && time() - $cacheTime < filemtime($cachedFile)) {
    readfile($cachedFile);
    exit;
}

ob_start();
