<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
	public function fetchCart($userid)
	{

		$db = db_connect();

		$result = $db->query("SELECT *
        FROM tbl_products
        WHERE product_id IN (SELECT product_id FROM tbl_cart WHERE user_id='$userid');");

		return $result->getResult();
	}
	public function removeItem($userid, $product_id)
	{

		$db = db_connect();

		$result = $db->query("DELETE FROM tbl_cart WHERE user_id='$userid' AND product_id='$product_id'");

		return $result;
	}
	public function fetchAllProducts()
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_products");

		return $status->getResultArray();
	}
	public function fetchFilteredProducts($modifier)
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_products WHERE gender ='$modifier'");

		return $status->getResultArray();
	}
	public function checkproduct($product, $customer)
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_cart WHERE product_id='$product' AND user_id='$customer'");
		$row = $status->getResultArray();

		if (count($row)) {
			return count($row);
		} else {
			return 'okay';
		}
	}
	public function order($product, $customer)

	{
		$db = db_connect();
		$status = $db->query("INSERT INTO tbl_cart (user_id,product_id)VALUES('$customer','$product')");
		return $status;
	}
}
