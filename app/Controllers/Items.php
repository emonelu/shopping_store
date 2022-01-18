<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\UserModel;

use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;

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
    public function Wallet()
    {
        $user = $this->request->getPost('user');
        $model = new UserModel();
        $result = $model->Wallet($user);

        return $this->response->setJSON($result);
    }
}
