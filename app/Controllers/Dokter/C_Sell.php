<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;

class C_Sell extends BaseController
{
    public function index()
    {
        return view('dokter/jual_ternak/index', [
            'c_list' => view('dokter/jual_ternak/c_list'),
        ]);
    }

}
