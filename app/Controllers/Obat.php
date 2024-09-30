<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatModel;
use CodeIgniter\HTTP\ResponseInterface;

class Obat extends BaseController
{
    protected $obat;

    public function __construct()
    {
        $this->obat = new ObatModel();
    }

    public function index()
    {
        $obat = $this->obat;

        $page = $this->request->getGet('page_obat') ? $this->request->getGet('page_obat') : 1;

        if ( $this->request->getGet('keyword') ) {
            $obat = $obat->like('nama_obat', $this->request->getGet('keyword'));
            return $this->response->setJSON([
                'status' => true,
                'data' => $obat->paginate(10, page:$page)
            ]);
        }

        if ( $this->request->getGet('fetch') ) {
            return $this->response->setJSON([
                'status' => true,
                'data' => $obat->paginate(10, page:$page)
            ]);
        }

        $data = [
            'title' => 'Obat',
            'obat' => $obat->paginate(10, page:$page),
            'pager' => $obat->pager
        ];

        return view('user-umum/obat/index', $data);
    }
}
