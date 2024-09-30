<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class EdukasiModel extends Model
{
    protected $table = 'edukasi';
    protected $primaryKey = 'id_edukasi';

    protected $allowedFields = [
        'judul_yt', 'deskripsi', 'link_yt'
    ];


    public function getEdukasi()
    {
        return $this->findAll(); // Menggunakan metode findAll() dari Model
    }
}


