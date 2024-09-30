<?php

namespace App\Models;

use CodeIgniter\Model;

class HewanTernakModel extends Model
{
    protected $table            = 'hewan_ternak';
    protected $primaryKey       = 'id_hewan';
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

    public function getHewanTernak($id) {
        return $this->select('hewan_ternak.*, jenis_ternak.jenis_ternak, ternak.nama_hewan as nama_ternak')->join('jenis_ternak', 'jenis_ternak.id_jenis_ternak = hewan_ternak.id_jenis_ternak')->join('ternak', 'ternak.id_ternak = hewan_ternak.id_ternak')->find($id);
    }
}
