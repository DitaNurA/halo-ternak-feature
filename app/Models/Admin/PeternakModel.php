<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PeternakModel extends Model
{
    protected $table = 'peternak';
    protected $primaryKey = 'id_peternak';
    protected $allowedFields = [
        'nama_peternak',
        'alamat',
        'jumlah_kandang',
        'jumlah_ternak',
        'layanan_selesai',
        'no_wa',
        'password',
        'foto',
    ];

    public function getAllPeternak()
    {
        return $this->findAll();
    }

    public function getPeternakById($id)
    {
        return $this->where('id_peternak', $id)->first();
    }
}
