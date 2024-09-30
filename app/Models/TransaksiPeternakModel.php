<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiPeternakModel extends Model
{
    protected $table            = 'transaksi_peternak';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTransaksi($status = 'proses') {
        return $this->select('transaksi_peternak.*, hewan_ternak.nama_hewan, user.nama as nama_petugas')->join('hewan_ternak', 'hewan_ternak.id_hewan = transaksi_peternak.id_hewan_ternak')->join('user', 'user.id_user = transaksi_peternak.id_petugas')->where('transaksi_peternak.id_peternak', session()->get('id'))->where('status', $status);
    }
}
