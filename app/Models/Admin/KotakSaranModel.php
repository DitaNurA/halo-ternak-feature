<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KotakSaranModel extends Model
{
    protected $table = 'kotak_saran';
    protected $primaryKey = 'id_saran';
    protected $allowedFields = ['nama', 'no_wa', 'saran'];

    // Fungsi untuk mengambil semua saran
    public function getAllSaran()
    {
        return $this->findAll();
    }
}
