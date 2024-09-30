<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TernakModel;
use CodeIgniter\HTTP\ResponseInterface;

class Ternak extends BaseController
{
    protected $ternak;

    public function __construct()
    {
        $this->ternak = new TernakModel();
    }

    public function index()
    {
        // 
    }
}
