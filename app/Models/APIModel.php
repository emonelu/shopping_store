<?php

namespace App\Models;

use CodeIgniter\Model;

class APIModel extends Model
{

    public function token_validator($token)
    {
        $db = db_connect();
        $error = 'Token is Invalid or does not exist';
        $success = 'Nice';

        $valid = $db->query("SELECT * FROM tbl_apitokens WHERE api_token='$token'");


        if (count($this->response->getArray($valid)) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function fetchUsersList($token)
    {

        $db = db_connect();
        $error = 'Token is Invalid or does not exist';

        $validation = $db->query("SELECT * FROM tbl_apitokens WHERE api_token='$token' ");

        if (count($this->response->getArray($validation)) == 1) {
            $result = $db->query("SELECT * FROM tbl_users");

            return $result->getResult();
        } else {
            return $error;
        }
    }
    public function fetchUsersListEmail($token, $email)
    {
        $db = db_connect();
        $error = 'Token is Invalid or does not exist';

        $validation = $db->query("SELECT * FROM tbl_apitokens WHERE api_token='$token' ");

        if (count($this->response->getArray($validation)) == 1) {

            $result = $db->query("SELECT * FROM tbl_users WHERE email='$email'");

            return $result->getResult();
        } else {
            return $error;
        }
    }
    public function fetchUsersListGender($token, $gender)
    {
        $db = db_connect();
        $error = 'Token is Invalid or does not exist';

        $validation = $db->query("SELECT * FROM tbl_apitokens WHERE api_token='$token' ");

        if (count($this->response->getArray($validation)) == 1) {

            $result = $db->query("SELECT * FROM tbl_users WHERE gender='$gender'");

            return $result->getResult();
        } else {
            return $error;
        }
    }
    // public function fetchUsersListItemBought($token,$item_id)
    // {
    //     $db = db_connect();

    //     $result = $db->query("SELECT * FROM tbl_users WHERE ='$item_id'");

    //     return $result->getResult();
    // }
    public function fetchUsersListAge($token)
    {
        $db = db_connect();
        $error = 'Token is Invalid or does not exist';

        $validation = $db->query("SELECT * FROM tbl_apitokens WHERE api_token='$token' ");

        if (count($this->response->getArray($validation)) == 1) {

            $result = $db->query("SELECT * FROM tbl_users  ORDER BY age DESC");

            return $result->getResult();
        } else {
            return $error;
        }
    }
    public function fetchProductList()
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_products");

        return $result->getResult();
    }
    public function fetchProductListbyAdder($id)
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_products  WHERE added_by ='$id'");

        return $result->getResult();
    }
    public function fetchProductListbyCategory($category)
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_products WHERE subcategory_id ='$category'");

        return $result->getResult();
    }
}
