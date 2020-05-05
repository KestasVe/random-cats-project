<?php

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = trim($requestUri, '/');
$host = $_SERVER['HTTP_HOST'];

if (is_numeric($requestUri)) {
	if (is_int($requestUri * 1) && $requestUri > 0 && $requestUri <= 1000000) {
		require __DIR__ . '/src/cats.html';
	} else {
		http_response_code(404);
		require __DIR__ . '/src/404.php';
	}
} else if ($requestUri === '' || $requestUri === '/') {
	header("Location: http://$host/1");
} else {
	http_response_code(404);
    require __DIR__ . '/src/404.php';
}
