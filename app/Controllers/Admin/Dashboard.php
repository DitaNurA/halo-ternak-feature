<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard/index', [
            'overview' => view('admin/dashboard/overview'),
            'stats' => view('admin/dashboard/stats'),
            'hiadmin' => view('admin/dashboard/hiadmin'),
        ]);
    }
}
