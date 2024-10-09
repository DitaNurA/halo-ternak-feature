<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;

class C_Obat extends BaseController
{
    public function index()
    {
        return view('dokter/obat/index', [
            'c_listobat' => view('dokter/obat/c_listobat'),
        ]);
    }

}
