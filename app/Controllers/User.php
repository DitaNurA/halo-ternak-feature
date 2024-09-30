<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    protected $user;
    protected $rules = [
        'nama' => 'required',
        'no_wa' => 'required',
    ];
    protected $validationMessage = [];

    public function __construct()
    {
        helper('form_helper');
        $this->user = new UserModel();
        $this->validationMessage['nama'] = validation_error_message();
        $this->validationMessage['no_wa'] = validation_error_message();
    }

    public function index()
    {
        //
    }

    public function update() {
        $image = $this->request->getFile('foto');
        
        if ( $image->getName() ) {
            \Config\Services::validation()->setRule('foto', 'foto', 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,1000]', [
                'mime_in' => 'Extension gambar tidak dizinkan',
                'max_size' => 'Ukuran gambar terlalu besar. max 1mb!'
            ]);
        }

        if ( !$this->validate($this->rules, $this->validationMessage) ) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => \Config\Services::validation()->getErrors()
            ]);
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'no_wa' => $this->request->getVar('no_wa'),
            'alamat' => $this->request->getVar('alamat')
        ];

        $foto = session()->get('foto');

        if ( $image->getName() ) {
            $filename = $image->getRandomName();
            $image->move(ROOTPATH . 'public/assets/images/user', $filename);
            $data['foto'] = $filename;
            $foto = $filename;
        }

        if ( $this->user->update(session()->get('id'), $data) ) {
            session()->set('foto', $foto);
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
