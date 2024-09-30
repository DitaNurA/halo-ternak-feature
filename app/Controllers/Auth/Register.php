<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\KecamatanModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    protected $user;
    protected $rules = [
        'nama_lengkap' => [
            'rules' => 'required|min_length[3]|max_length[50]',
        ],
        'no_wa' => [
            'rules' => 'required|numeric|is_unique[user.no_wa,id,{id}]',
        ],
        'password' => [
            'rules' => 'required|min_length[8]|max_length[50]',
            'errors' => [
                'required' => '{field} tidak boleh kosong.',
                'min_length' => '{field} minimal 8 karakter.'
            ]
        ]
    ];
    protected $validationMessage = [];
    
    public function __construct()
    {
        $this->user = new UserModel();
        helper('form_helper');
        $this->validationMessage['nama_lengkap'] = validation_error_message();
        $this->validationMessage['no_wa'] = validation_error_message();
        $this->validationMessage['password'] = validation_error_message();
    }

    public function index() {
        $kecamatan = new KecamatanModel();

        $data = [
            'title' => 'Daftar',
            'kecamatan' => $kecamatan->findAll()
        ];

        return view('auth/register', $data);
    }

    public function store() {
        if ( !$this->validate($this->rules, $this->validationMessage) ) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => \Config\Services::validation()->getErrors()
            ]);
        }

        $data = [
            'nama' => $this->request->getVar('nama_lengkap'),
            'alamat' => $this->request->getVar('alamat'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'desa_binaan' => $this->request->getVar('desa_binaan'),
            'no_wa' => $this->request->getVar('no_wa'),
            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'kata_sandi' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'id_role' => $this->request->getVar('role')
        ];

        if ( $this->user->insert($data) ) {
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
}
