<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;

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
    public function Wallet($user)
    {
        $db = db_connect();

        $res = $db->query("SELECT amount_available FROM tbl_wallet WHERE user_id=$user");

        $row = $res->getRowArray();

        return $row;
    }
}
