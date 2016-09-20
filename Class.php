<?php

class Stock
{
	public function getProduct($index = null)
	{
		return ($index != null) ? $_SESSION['stock'][$index] : $_SESSION['stock'];
	}

	public function addProduct($product)
	{
		$_SESSION['stock'][] = $product;
		return $product;
	}

	public function removeProduct($index)
	{
		unset($_SESSION['stock'][$index]);
		return empty($_SESSION['stock'][$index]);
	}
}

class Cart
{
	public function getProduct()
	{
		return $_SESSION['cart'];
	}

	public function addProduct($index)
	{
		$stock   = new Stock;
		$product = $stock->getProduct($index);

		if (!empty($product)) {
			$_SESSION['cart'][] = $product;
		}

		return $product;
	}

	public function removeProduct($index)
	{
		unset($_SESSION['cart'][$index]);
		return empty($_SESSION['cart'][$index]);
	}
}