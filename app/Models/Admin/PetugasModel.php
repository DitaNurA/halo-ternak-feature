<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';

    protected $allowedFields = [
        'id_user','nama', 'no_registrasi', 'kecamatan', 'desa_binaan',
        'no_wa', 'password', 'status', 'foto'
    ];

    //protected $validationRules = [
      //  'nama_petugas'   => 'required',
        //'no_registrasi'  => 'required',
        //'kecamatan'      => 'required',
        //'desa_binaan'    => 'required',
        //'nomor_hp'       => 'required',
        //'password'       => 'permit_empty',
        //'foto'           => 'permit_empty|is_image[foto]|max_size[foto,2048]',
    //];

    public function getPetugas()
    {
        return $this->findAll(); // Menggunakan metode findAll() dari Model
    }
}


