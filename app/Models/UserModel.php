<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    public function checkCreds($email, $password)
    {
        $db = db_connect();

        $result = $db->query("SELECT* FROM tbl_users WHERE email='$email' AND password='$password'");

        $row = $result->getRowArray();

        return $row;
    }
    public function addUser($firstname, $lastname, $email, $password, $gender)
    {

        $db = db_connect();

        $role = 1;

        $result = $db->query("INSERT INTO tbl_users (first_name,last_name,email,password,gender,role)VALUES('$firstname','$lastname','$email','$password','$gender','$role')");

        if ($result) {
            return 1;
        } else {
            return $result;
        }
    }
    public function getUser($id)
    {
        $db = db_connect();

        $query = "SELECT * FROM tbl_users WHERE user_id = '$id'";
        $res = $db->query($query);
        $row = $res->getResultArray();

        return $row;
    }
    function getWalletbalance($customer_id)
    {
        $db = db_connect();

        $res = $db->query("SELECT amount_available FROM tbl_wallet WHERE user_id='$customer_id'");

        $row = $res->getRowArray();

        return $row;
    }
    function updateWalletbalance($customer_id, $amount_available)
    {
        $db = db_connect();

        $res = $db->query("UPDATE tbl_wallet SET amount_available = $amount_available WHERE user_id=$customer_id");

        return $res;
    }
}
