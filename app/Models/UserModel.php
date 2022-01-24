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
    public function checkadmin($email, $password)
    {
        $db = db_connect();

        $result = $db->query("SELECT* FROM tbl_users WHERE email='$email' AND password='$password' AND role=3");

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
    public function displayUsers()
    {
        $db = db_connect();

        $res = $db->query('SELECT * FROM tbl_users ORDER BY user_id DESC');
        return $res->getResultArray();
    }
}
