<?php
session_start();
require_once('../Class.php');

$method = $_SERVER['REQUEST_METHOD'];
$cart   = new Cart;

switch ($method) {
	case 'GET':
		$response = $cart->getProduct();
		break;
	case 'POST':
		$index    = $_REQUEST['productindex'];
		$response = $cart->addProduct($index);
		break;
	case 'DELETE':
		$index    = $_REQUEST['index'];
		$response = $cart->removeProduct($index);
		break;
	default:
		$response = '= =';
		break;
}

header('Content-Type: application/json');
echo(json_encode($response));
exit;