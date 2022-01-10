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
}
