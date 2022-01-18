<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ItemModel;


class Admin extends BaseController
{
    public function index()
    {
        return view('Admin/login');
    }
}
