<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HewanTernakModel;
use App\Models\TransaksiPeternakModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class TransaksiPeternak extends BaseController
{
    protected $transaksiPeternak;
    protected $rules = [
        'id_layanan' => 'required|numeric',
        'address' => 'required',
        'deskripsi' => 'required',
        'tanggal' => 'required',
        'waktu' => 'required'
    ];
    protected $validationMessage = [];

    public function __construct()
    {
        helper('form_helper');
        $this->validationMessage['id_layanan'] = validation_error_message();
        $this->validationMessage['address'] = validation_error_message();
        $this->validationMessage['deskripsi'] = validation_error_message();
        $this->validationMessage['tanggal'] = validation_error_message();
        $this->validationMessage['waktu'] = validation_error_message();
        $this->transaksiPeternak = new TransaksiPeternakModel();
    }

    public function getPetugas($address, $kecamatan) {
        $petugas = new UserModel();
        $petugas = $petugas->like('kecamatan', $kecamatan)->where('id_role', 3)->orderBy('rand()')->first();

        return $petugas['id_user'];
        // $id_petugas = [];
        // $result = [];

        // foreach($petugas as $row) {
        //     $addr = explode(',', $address);
        //     $lat1 = $addr[0];
        //     $lon1 = $addr[1];

        //     $addr2 = explode(',', $row['ip_alamat']);
        //     $lat2 = $addr2[0];
        //     $lon2 = $addr2[1];

        //     $theta = $lon1 - $lon2;
        //     $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        //     $dist = acos($dist);
        //     $dist = rad2deg($dist);
        //     $miles = $dist * 60 * 1.1515;
        //     $id_petugas[] = $row['id_user'];
        //     $result[] = $miles;
        // }

        // return $id_petugas;
    }

    public function store($id = null) {
        $hewanTernak = new HewanTernakModel();

        $find = $hewanTernak->find($id);

        if ( $find['id_hewan'] ) {
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

            $id_petugas = $this->getPetugas($this->request->getVar('address'), $this->request->getVar('kecamatan'));

            if ( !$id_petugas ) {
                return $this->response->setJSON([
                    'status' => false,
                    'error' => 'Gagal mencari dokter terdekat. Harap coba lagi!'
                ]);
            }

            $image = $this->request->getFile('foto');
            $filename = $image->getRandomName();
            $image->move(ROOTPATH . 'public/assets/images/order-layanan', $filename);

            $data = [
                'id_layanan' => $this->request->getVar('id_layanan'),
                'id_peternak' => session()->get('id'),
                'id_hewan_ternak' => $id,
                'id_petugas' => $id_petugas,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'waktu' => $this->request->getVar('waktu'),
                'foto' => $filename
            ];

            if ( $this->transaksiPeternak->insert($data) ) {
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
            return $this->response->setJSON([
                'status' => false,
                'error' => 'Hewan ternak tidak ditemukan!'
            ]);
        }
    }
}
