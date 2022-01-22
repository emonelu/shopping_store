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

		$result = $db->query("");

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
}
