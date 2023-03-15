<?php

$path = __DIR__ . $_SERVER['REQUEST_URI'];

error_reporting(E_ERROR);



if( file_exists( $path ) && is_file( $path ) ){
	return false;
}


ob_start();
require_once __DIR__ . '/index.php';
$response = ob_get_clean();

echo str_replace('http://localhost/gaurav/memory-4/', '/', $response);
