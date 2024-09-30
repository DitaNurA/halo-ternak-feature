<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KotakSaranModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class KotakSaran extends BaseController
{
    protected $kotakSaran;
    protected $rules = [
        'nama' => 'required',
        'no_wa' => 'required',
        'saran' => 'required'
    ];
    protected $validationMessage = [];

    public function __construct()
    {
        helper('form_helper');
        $this->validationMessage['nama'] = validation_error_message();
        $this->validationMessage['no_wa'] = validation_error_message();
        $this->validationMessage['saran'] = validation_error_message();
        $this->kotakSaran = new KotakSaranModel();
    }

    public function store() {
        if ( !session()->get('id') ) {
            return $this->response->setJSON([
                'status' => false,
                'message' => '401 Unauthorized!'
            ]);
        }

        if ( !$this->validate($this->rules, $this->validationMessage) ) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => \Config\Services::validation()->getErrors()
            ]);
        }

        $user = new UserModel();
        $user = $user->find(session()->get('id'));

        $data = [
            'nama' => $user['nama'],
            'no_wa' => $user['no_wa'],
            'saran' => $this->request->getVar('saran')
        ];

        if ( $this->kotakSaran->insert($data) ) {
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
