<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Items extends BaseController
{

    public function fetchCart()
    {
        $fetch = new ItemModel();
        $userid = $this->request->getPost('userid');

        $result['data'] = $fetch->fetchCart($userid);

        return $this->response->setJson($result);
    }
}
