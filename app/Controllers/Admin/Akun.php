<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Akun extends BaseController
{
    public function index()
    {
        return view('admin/akun/index', [
            'show' => view('admin/akun/show'), 
        ]);
    }
}