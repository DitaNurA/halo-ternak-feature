<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use CodeIgniter\HTTP\ResponseInterface;

class Layanan extends BaseController
{
    protected $layanan;

    public function __construct()
    {
        $this->layanan = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Layanan',
            'layanan' => $this->layanan->findAll()
        ];

        return view('user-umum/layanan/index', $data);
    }
}
