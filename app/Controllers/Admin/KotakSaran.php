<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KotakSaranModel;  // Tambahkan model

class KotakSaran extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $kotakSaranModel = new KotakSaranModel();
        
        // Ambil data dari tabel kotak_saran
        $dataSaran = $kotakSaranModel->findAll();
        
        // Kirim data ke view listsaran
        return view('admin/kotak_saran/kotak_saran', [
            'listsaran' => view('admin/kotak_saran/listsaran', ['saran' => $dataSaran]),  // Mengirim data saran ke listsaran
        ]);
    }
}
