<?php

namespace App\Controllers;

use App\Models\APIModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Api extends BaseController
{
    public function token_tester()
    {
        $model = new APIModel();
        $token = $this->request->getVar('token');

        $result = $model->token_validator($token);

        return $this->response->setJson($result);
    }
    public function index()
    {
        return view('API/api_home');
    }
    public function api_login()
    {
        return view('API/api_login');
    }
    public function usersList()
    {
        $model = new APIModel();
        $token = $this->request->getVar('token');

        $result = $model->fetchUsersList($token);

        return $this->response->setJson($result);
    }
    public function usersListEmail()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $model = new APIModel();

        $result = $model->fetchUsersListEmail($token, $email);

        return $this->response->setJson($result);
    }
    public function usersListGender()
    {
        $gender = $this->request->getVar('gender');
        $token = $this->request->getVar('token');
        $model = new APIModel();

        $result = $model->fetchUsersListGender($token, $gender);

        return $this->response->setJson($result);
    }
    public function usersListItemBought()
    {
        $item_id = $this->request->getVar('gender');
        $token = $this->request->getVar('token');
        $model = new APIModel();

        $result = $model->fetchUsersListGender($token, $item_id);

        return $this->response->setJson($result);
    }
    public function usersListAge()
    {
        $model = new APIModel();
        $token = $this->request->getVar('token');

        $result = $model->fetchUsersListAge($token);

        return $this->response->setJson($result);
    }
    public function productList()
    {
        $model = new APIModel();

        $result = $model->fetchProductList();

        return $this->response->setJson($result);
    }
    public function productListID()
    {
        $id = $this->request->getVar('id');
        $model = new APIModel();

        $result = $model->fetchProductListbyAdder($id);

        return $this->response->setJson($result);
    }
    public function productListCAT()
    {
        $category = $this->request->getVar('category');
        $model = new APIModel();

        $result = $model->fetchProductListbyCategory($category);

        return $this->response->setJson($result);
    }
}
