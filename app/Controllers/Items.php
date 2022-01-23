<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Items extends BaseController
{

    public function fetchCart()
    {
        $fetch = new ItemModel();
        $userid = $this->request->getPost('userid');

        $result['result'] = $fetch->fetchCart($userid);

        return $this->response->setJson($result);
    }
    public function removeItem()
    {
        $pop = new ItemModel();
        $userid = $this->request->getPost('userid');
        $productid = $this->request->getPost('productid');

        $response = $pop->removeItem($userid, $productid);

        return $response;
    }
    public function fetchAllProducts()
    {

        $products = new ItemModel();
        $result['products'] = $products->fetchAllProducts();

        return $this->response->setJSON($result);
    }
    public function fetchFilteredProducts()
    {
        $filtered = new ItemModel();
        $modifier = $this->request->getPost('gender');

        $result['products'] = $filtered->fetchFilteredProducts($modifier);

        return $this->response->setJSON($result);
    }
    public function addToCart()
    {
        $product = $this->request->getPost('productid');
        $customer = $this->request->getPost('customer');

        $newOrder = new ItemModel();
        if ($newOrder->checkproduct($product, $customer) == 'okay') {
            $result = $newOrder->order($product, $customer);
            try {
                if ($result) {
                    echo 1;
                }
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        } else {
            echo 'duplicate';
        }
    }
}
