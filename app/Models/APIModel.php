<?php

namespace App\Models;

use CodeIgniter\Model;

class APIModel extends Model
{

    public function auth($username, $key)
    {

        $db = db_connect();

        $result = $db->query("SELECT* FROM tbl_apiusers WHERE username='$username' AND user_key='$key'");

        $row = $result->getRowArray();

        return $row;
    }
    public function token_generator()
    {
    }
    public function addapiUser($username, $key)
    {

        $db = db_connect();

        $result = $db->query("INSERT INTO tbl_apiusers OUTPUT Inserted.apiuser_id (username,user_key)VALUES('$username','$key')");

        if ($result->getRowArray()) {

            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $rand_token =  substr(
                str_shuffle($str_result),
                0,
                16
            );


            $generate = $db->query("INSERT INTO tbl_apitokens (apiuser_id,api_token) VALUES('$','$rand_token')");
            return 1;
        } else {
            return $result;
        }
    }


    public function token_validator($token)
    {
        $db = db_connect();
        $error = 'Token is Invalid or does not exist';

        $valid = $db->query("SELECT * FROM tbl_apitokens WHERE api_token='$token'");


        if (count($this->response->getArray($valid)) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getToken($apiuserid)
    {
        $db = db_connect();
        $error = 'Token is Invalid or does not exist';

        $result = $db->query("SELECT * FROM tbl_apitokens WHERE api_userid ='$apiuserid'");

        if (count($result->getResultArray()) < 1) {
            return $error;
        } else {
            return $this->response->getArray($result);
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
