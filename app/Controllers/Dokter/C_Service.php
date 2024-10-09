<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;

class C_Service extends BaseController
{
    public function index()
    {
        return view('dokter/layanan/index', [
            'c_show' => view('dokter/layanan/c_show'),
        ]);
    }

}
