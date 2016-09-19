<?php
session_start();
require_once('../Class.php');

$method = $_SERVER['REQUEST_METHOD'];
$stock  = new Stock;

switch ($method) {
	case 'GET':
		$index    = $_GET['index'];
		$response = $stock->getProduct($index);
		break;
	case 'POST':
		$product  = $_POST;
		$response = $stock->addProduct($product);
		break;
	case 'DELETE':
		$index    = $_REQUEST['index'];
		$response = $stock->removeProduct($index);
		break;
	default:
		$response = '= =';
		break;
}

header('Content-Type: application/json');
echo(json_encode($response));
exit;