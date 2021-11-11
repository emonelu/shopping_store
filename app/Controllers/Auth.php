<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login.php');
    }

    public function processLogin(){
        //TODO Handle the login backedn functionality
        echo "Works";

        $userModel = new UserModel();
        $user_details = $userModel -> getOneUser();

        $session = session();
        $session->set('user_details', $user_details);
        return redirect()->to('auth/homepage');
    }


    
    public function homePage(){
        //loads the User HomePage
        return view('auth/homepage.php');
    }
    public function register(){
        //loads the Registration page
        return view('auth/register.php');
    }
    public function processRegistration(){
        //TODO Handle the registration backedn functionality
    }
}
