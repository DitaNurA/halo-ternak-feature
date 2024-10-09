<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function home()
    {
        return view('dokter/home/home', [
            'landingpage' => view('dokter/home/landingpage'),
            'tentangkami' => view('dokter/home/tentangkami'),
            'fitur' => view('dokter/home/fitur'),
            'edukasi' => view('dokter/home/edukasi'),
        ]);
    }
}
