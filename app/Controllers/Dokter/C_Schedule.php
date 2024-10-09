<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;

class C_Schedule extends BaseController
{
    public function index()
    {
        return view('dokter/schedule/index', [
            'listjadwal' => view('dokter/schedule/listjadwal'),
            'listpesanan' => view('dokter/schedule/listpesanan'),
            'list_riwayat' => view('dokter/schedule/list_riwayat'),
            'profil' => view('dokter/schedule/profil'),
        ]);
    }
    public function jadwal(){
        return view('dokter/schedule/sch', [
            'show_jadwal' => view('dokter/schedule/show_jadwal'),
        ]);
    }
}
