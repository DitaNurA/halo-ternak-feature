<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HewanTernakModel;
use App\Models\KandangTernakModel;
use App\Models\TernakModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class KandangTernak extends BaseController
{
    protected $kandangTernak;
    protected $rules = [
        'nama_kandang' => 'required|is_unique[kandang_ternak.nama_kandang,id,{id}]',
        'kapasitas_kandang' => 'required|numeric',
        'id_ternak' => 'required|numeric',
        'kecamatan' => 'required',
        // 'kelurahan' => 'required',
        'alamat_lengkap' => 'required',
        'ip_alamat' => 'required'
    ];
    protected $validationMessage = [];

    public function __construct()
    {
        helper('form_helper');
        $this->kandangTernak = new KandangTernakModel();
        $this->validationMessage['nama_kandang'] = validation_error_message();
        $this->validationMessage['kapasitas_kandang'] = validation_error_message();
        $this->validationMessage['id_ternak'] = validation_error_message();
        $this->validationMessage['kecamatan'] = validation_error_message();
        $this->validationMessage['alamat_lengkap'] = validation_error_message();
        $this->validationMessage['ip_alamat'] = validation_error_message();
    }

    public function index()
    {
        //
    }

    public function add() {
        $user = new UserModel();
        $ternak = new TernakModel();

        $data = [
            'title' => 'Tambah Data',
            'user' => $user->find(session()->get('id')),
            'ternak' => $ternak->findAll(),
        ];

        return view('peternak/kandang/add', $data);
    }

    public function store() {
        $this->rules['foto_kandang'] = [
            'rules' => 'uploaded[foto_kandang]|is_image[foto_kandang]|mime_in[foto_kandang,image/jpg,image/jpeg,image/png,image/webp]|max_size[foto_kandang,1000]',
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

        $image = $this->request->getFile('foto_kandang');
        $filename = $image->getRandomName();
        $image->move(ROOTPATH . 'public/assets/images/kandang', $filename);

        $data = [
            'nama_kandang' => $this->request->getVar('nama_kandang'),
            'foto' => $filename,
            'kapasitas' => $this->request->getVar('kapasitas_kandang'),
            'id_ternak' => $this->request->getVar('id_ternak'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            // 'kelurahan' => $this->request->getVar('kelurahan'),
            'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
            'ip_alamat' => $this->request->getVar('ip_alamat')
        ];

        if ( $this->kandangTernak->insert($data) ) {
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
    }
    
    public function edit($id = null) {
        $kandang = $this->kandangTernak->select('kandang_ternak.*, ternak.nama_hewan, count(ternak.id_ternak) as total_ternak')->join('ternak', 'ternak.id_ternak = kandang_ternak.id_ternak')->find($id);
        $ternak = new TernakModel();

        if ( $kandang['id_kandang_ternak'] ) {
            $data = [
                'title' => 'Ubah Data',
                'ternak' => $ternak->findAll(),
                'data' => $kandang
            ];
    
            return view('peternak/kandang/edit', $data);
        } else {
            return redirect()->back();
        }
    }

    public function update($id = null) {
        $find = $this->kandangTernak->find($id);

        if ( $find['id_kandang_ternak'] ) {
            $data = [
                'nama_kandang' => $this->request->getVar('nama_kandang'),
                'kapasitas' => $this->request->getVar('kapasitas_kandang'),
                'id_ternak' => $this->request->getVar('id_ternak'),
                'kecamatan' => $this->request->getVar('kecamatan'),
                // 'kelurahan' => $this->request->getVar('kelurahan'),
                'alamat_lengkap' => $this->request->getVar('alamat_lengkap'),
                'ip_alamat' => $this->request->getVar('ip_alamat')
            ];

            $image = $this->request->getFile('foto_kandang');

            if ( isset($_FILES['foto_kandang']) && $_FILES['foto_kandang']['name'] ) {
                $this->rules['foto_kandang'] = [
                    'rules' => 'is_image[foto_kandang]|mime_in[foto_kandang,image/jpg,image/jpeg,image/png,image/webp]|max_size[foto_kandang,1000]',
                    'errors' => [
                        'required' => 'Harap pilih gambar!',
                        'is_image' => 'Gambar tidak valid',
                        'mime_in' => 'Extension tidak dizinkan',
                        'max_size' => 'Ukuran gambar terlalu besar. max 1mb!'
                    ]
                ];
            }

            if ( !$this->validate($this->rules, $this->validationMessage) ) {
                return $this->response->setJSON([
                    'status' => false,
                    'errors' => \Config\Services::validation()->getErrors()
                ]);
            }

            if ( isset($_FILES['foto_kandang']) && $_FILES['foto_kandang']['name'] ) {
                $filename = $image->getRandomName();
                $image->move(ROOTPATH . 'public/assets/images/kandang', $filename);
                $data['foto'] = $filename;
            }

            if ( $this->kandangTernak->update($id, $data) ) {
                if ( isset($_FILES['foto_kandang']) && $_FILES['foto_kandang']['name'] ) {
                    if ( $find['foto'] && file_exists(ROOTPATH . 'public/assets/images/kandang/' . $find['foto']) ) {
                        unlink(ROOTPATH . 'public/assets/images/kandang/' . $find['foto']);
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
            return redirect()->back();
        }
    }

    public function detail($id = null) {
        $kandang = $this->kandangTernak->select('kandang_ternak.*, ternak.nama_hewan, count(ternak.id_ternak) as total_ternak')->join('ternak', 'ternak.id_ternak = kandang_ternak.id_ternak')->find($id);
        $hewan_ternak = new HewanTernakModel();

        $page = $this->request->getGet('hewan_ternak') ? $this->request->getGet('hewan_ternak') : 1;

        if ( $kandang['id_kandang_ternak'] ) {
            $data = [
                'title' => 'Detail Kandang',
                'data' => $kandang,
                'hewan_ternak' => $hewan_ternak->where('id_kandang_ternak', $id)->paginate(10, page:$page),
                'pager' => $hewan_ternak->pager
            ];
    
            return view('peternak/kandang/detail', $data);
        } else {
            return redirect()->back();
        }
    }

    public function search() {
        $keyword = $this->request->getGet('keyword') ? $this->request->getGet('keyword') : '';
        $data = $this->kandangTernak->searchKandang($keyword);

        $page = $this->request->getGet('kandang') ? $this->request->getGet('kandang') : 1;

        return $this->response->setJSON([
            'status' => true,
            'data' => $data->paginate(10, page:$page)
        ]);
    }

    public function delete($id = null) {
        $data = $this->kandangTernak->find($id);
        if ( $data['id_kandang_ternak'] ) {
            if ( $this->kandangTernak->delete($id) ) {
                if ( $data['foto'] && file_exists(ROOTPATH . 'public/assets/images/kandang/' . $data['foto']) ) {
                    unlink(ROOTPATH . 'public/assets/images/kandang/' . $data['foto']);
                }
                session()->setFlashdata('success', 'Kandang berhasil dihapus!');
                return redirect()->to(role_url());
            } else {
                session()->setFlashdata('error', 'Kandang gagal dihapus!');
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
