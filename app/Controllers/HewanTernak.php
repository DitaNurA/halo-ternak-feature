<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HewanTernakModel;
use App\Models\JenisTernakModel;
use App\Models\KandangTernakModel;
use App\Models\LayananModel;
use App\Models\TernakModel;
use App\Models\TransaksiPeternakModel;
use CodeIgniter\HTTP\ResponseInterface;

class HewanTernak extends BaseController
{
    protected $hewanTernak;
    protected $rules = [
        'jenis_kelamin' => 'required',
        'jenis_ternak' => 'required|numeric',
        // 'jenis_hewan' => 'required|numeric',
        'berat' => 'required|numeric',
        'usia' => 'required|numeric',
        'harga' => 'required|numeric'
    ];
    protected $validationMessage = [];

    public function __construct()
    {
        helper('form_helper');
        $this->hewanTernak = new HewanTernakModel();
        $this->validationMessage['nama_hewan'] = validation_error_message();
        $this->validationMessage['jenis_kelamin'] = validation_error_message();
        $this->validationMessage['jenis_ternak'] = validation_error_message();
        // $this->validationMessage['jenis_hewan'] = validation_error_message();
        $this->validationMessage['berat'] = validation_error_message();
        $this->validationMessage['umur'] = validation_error_message();
        $this->validationMessage['harga'] = validation_error_message();
    }

    public function index()
    {
        $ternak = $this->hewanTernak->select('hewan_ternak.*, kandang_ternak.kecamatan, jenis_ternak.jenis_ternak, ternak.nama_hewan as nama_ternak')->join('jenis_ternak', 'jenis_ternak.id_jenis_ternak = hewan_ternak.id_jenis_ternak')->join('ternak', 'ternak.id_ternak = hewan_ternak.id_ternak')->join('kandang_ternak', 'kandang_ternak.id_kandang_ternak = hewan_ternak.id_kandang_ternak')->where('status_dijual', true);

        $page = $this->request->getGet('page_hewan') ? $this->request->getGet('page_hewan') : 1;

        if ( $this->request->getGet('keyword') ) {
            $keyword = $this->request->getGet('keyword');
            $ternak = $ternak->like('ternak.nama_hewan', $keyword);
            return $this->response->setJSON([
                'status' => true,
                'data' => $ternak->paginate(10, page:$page)
            ]);
        }

        if ( $this->request->getGet('fetch') ) {
            return $this->response->setJSON([
                'status' => true,
                'data' => $ternak->paginate(10, page:$page)
            ]);
        }

        $data = [
            'title' => 'Ternak',
            'ternak' => $ternak->paginate(10, page:$page),
            'pager' => $ternak->pager
        ];

        return view('user-umum/ternak/index', $data);
    }

    public function add($id = null) {
        $kandang = new KandangTernakModel();
        $ternak = new TernakModel();

        $find = $kandang->select('kandang_ternak.*, ternak.nama_hewan, count(ternak.id_ternak) as total_ternak')->join('ternak', 'ternak.id_ternak = kandang_ternak.id_ternak')->find($id);

        if ( $find ) {
            if ( intval($find['kapasitas']) <= 0 ) {
                session()->setFlashdata('error', 'Kandang sudah penuh!');
                return redirect()->back();
            }

            $data = [
                'title' => 'Tambah Hewan',
                'data' => $find,
                'ternak' => $ternak->findAll(),
            ];
        } else {
            return redirect()->back();
        }

        return view('peternak/hewan/add', $data);
    }

    public function store($id = null) {
        $kandangTernak = new KandangTernakModel();
        $kandang = $kandangTernak->find($id);
        $this->rules['nama_hewan'] = 'required|is_unique[hewan_ternak.nama_hewan,id,{id}]';

        if ( $kandang ) {
            $this->rules['foto'] = [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]|max_size[foto,1000]',
                'errors' => [
                    'uploaded' => 'Harap pilih gambar!',
                    'is_image' => 'Gambar tidak valid',
                    'mime_in' => 'Extension tidak dizinkan',
                    'max_size' => 'Ukuran gambar terlalu besar. max 1mb!'
                ]
            ];

            if ( !$this->validate($this->rules, $this->validationMessage) ) {
                return $this->response->setJSON([
                    'status' => false,
                    'errors' => \Config\Services::validation()->getErrors()
                ]);
            }

            $image = $this->request->getFile('foto');
            $filename = $image->getRandomName();
            $image->move(ROOTPATH . 'public/assets/images/hewan-ternak', $filename);

            $data = [
                'id_kandang_ternak' => $kandang['id_kandang_ternak'],
                'nama_hewan' => $this->request->getVar('nama_hewan'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'id_ternak' => $this->request->getVar('jenis_ternak'),
                'id_jenis_ternak' => $this->request->getVar('jenis_hewan'),
                'berat' => $this->request->getVar('berat'),
                'usia' => $this->request->getVar('usia'),
                'harga' => $this->request->getVar('harga'),
                'foto' => $filename
            ];

            if ( $this->hewanTernak->insert($data) ) {
                $kandangTernak->update($id, [
                    'kapasitas' => intval($kandang['kapasitas']) - 1
                ]);

                return $this->response->setJSON([
                    'status' => true,
                    'message' => '200 OK'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => '500 Internal Server Error'
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Kandang not found!'
            ]);
        }
    }

    public function edit($id = null) {
        $layanan = new LayananModel();
        $hewanTernak = $this->hewanTernak->getHewanTernak($id);
        $ternak = new TernakModel();

        if ( $hewanTernak ) {
            $data = [
                'title' => 'Ubah Hewan',
                'layanan' => $layanan->findAll(),
                'data' => $hewanTernak,
                'ternak' => $ternak->findAll(),
            ];
    
            return view('peternak/hewan/edit', $data);
        } else {
            return redirect()->to(role_url());
        }
    }

    public function update($id = null) {
        $find = $this->hewanTernak->find($id);

        if ( $find ) {
            
            if ( isset($_FILES['foto']) && $_FILES['foto']['name'] ) {
                $this->rules['foto'] = [
                    'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]|max_size[foto,1000]',
                    'errors' => [
                        'uploaded' => 'Harap pilih gambar!',
                        'is_image' => 'Gambar tidak valid',
                        'mime_in' => 'Extension tidak dizinkan',
                        'max_size' => 'Ukuran gambar terlalu besar. max 1mb!'
                    ]
                ];
            }

            if ( $this->request->getVar('nama_hewan') !== $find['nama_hewan'] ) {
                $this->rules['nama_hewan'] = 'required|is_unique[hewan_ternak.nama_hewan,id,{id}]';
            }

            if ( !$this->validate($this->rules, $this->validationMessage) ) {
                return $this->response->setJSON([
                    'status' => false,
                    'errors' => \Config\Services::validation()->getErrors()
                ]);
            }

            $data = [
                'nama_hewan' => $this->request->getVar('nama_hewan'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'id_ternak' => $this->request->getVar('jenis_ternak'),
                'id_jenis_ternak' => $this->request->getVar('jenis_hewan'),
                'berat' => $this->request->getVar('berat'),
                'usia' => $this->request->getVar('usia'),
                'harga' => $this->request->getVar('harga'),
            ];

            if ( isset($_FILES['foto']) && $_FILES['foto']['name'] ) {
                $image = $this->request->getFile('foto');
                $filename = $image->getRandomName();
                $image->move(ROOTPATH . 'public/assets/images/hewan-ternak', $filename);
                $data['foto'] = $filename;
            }

            if ( $this->hewanTernak->update($id, $data) ) {
                if ( isset($_FILES['foto']) && $_FILES['foto']['name'] ) {
                    if ( file_exists(ROOTPATH . 'public/assets/images/hewan-ternak' . $find['foto']) ) {
                        unlink(ROOTPATH . 'public/assets/images/hewan-ternak' . $find['foto']);
                    }
                }

                return $this->response->setJSON([
                    'status' => true,
                    'message' => '200 OK'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => '500 Internal Server Error'
                ]);
            }
        } else {
            return redirect()->to(role_url());
        }
    }

    public function detail($id = null) {
        $layanan = new LayananModel();
        $hewanTernak = $this->hewanTernak->getHewanTernak($id);
        $transaksiPeternak = new TransaksiPeternakModel();

        if ( $hewanTernak ) {
            $data = [
                'title' => 'Detail Hewan',
                'layanan' => $layanan->findAll(),
                'id_hewan' => $hewanTernak['id_hewan'],
                'data' => $hewanTernak,
                'transaksi_peternak' => $transaksiPeternak->getTransaksi()->paginate(10)
            ];

            return view('peternak/hewan/detail', $data);
        } else {
            return redirect()->to(role_url());
        }
    }

    public function search() {
        $keyword = $this->request->getGet('keyword') ? $this->request->getGet('keyword') : '';
        $data = $this->hewanTernak->like('nama_hewan', $keyword);

        $page = $this->request->getGet('hewan') ? $this->request->getGet('hewan') : 1;

        return $this->response->setJSON([
            'status' => true,
            'data' => $data->paginate(10, page:$page)
        ]);
    }

    public function delete($id = null) {
        $find = $this->hewanTernak->find($id);

        if ( $find ) {
            if ( $this->hewanTernak->delete($id) ) {
                if ( $find['foto'] && file_exists(ROOTPATH . 'public/assets/images/hewan-ternak' . $find['foto']) ) {
                    unlink(ROOTPATH . 'public/assets/images/hewan-ternak' . $find['foto']);
                }
                session()->setFlashdata('success', 'Data berhasil dihapus!');
                return redirect()->to(role_url());
            }
        } else {
            return redirect()->to(role_url());
        }
    }

    public function jual($id = null) {
        $find = $this->hewanTernak->find($id);

        if ( $find['id_hewan'] ) {
            if ( $this->hewanTernak->update($id, [
                'status_dijual' => true
            ]) ) {
                return $this->response->setJSON([
                    'status' => true,
                    'message' => '200 OK'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => '500 Internal Server Error!'
                ]);
            }
        } else {
            return redirect()->to(role_url());
        }
    }

    public function tidak_dijual($id = null) {
        $find = $this->hewanTernak->find($id);

        if ( $find['id_hewan'] ) {
            if ( $this->hewanTernak->update($id, [
                'status_dijual' => false
            ]) ) {
                return $this->response->setJSON([
                    'status' => true,
                    'message' => '200 OK'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => '500 Internal Server Error!'
                ]);
            }
        } else {
            return redirect()->to(role_url());
        }
    }
}
