<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login.php');
    }

    public function login()
    {
        //fetch the email and password from POST data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        //TODO Handle the login backend functionality
        $userModel = new UserModel();
        $result = $userModel->checkCreds($email, $password);

        try {
            if (count($result) > 0) {
                $name = $result['first_name'];
                $userid = $result['user_id'];
                $userdata = [
                    'name' => $name,
                    'userid' => $userid
                ];
                $session = session();
                $session->set($userdata);
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo 3;
        }
    }
    public function register()
    {
        //loads the Registration page
        return view('auth/register.php');
    }
    public function processRegistration()
    {
        //TODO Handle the registration backedn functionality

        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $gender = $this->request->getPost('gender');

        $handler = new UserModel();

        $result = $handler->addUser($firstname, $lastname, $email, $password, $gender);

        return $result;
    }
    public function logout()
    {
        $session = session();
        $session->destroy();

        return 1;
    }
}
