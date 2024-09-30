<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KandangTernakModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Peternak extends BaseController
{
    public function index() {
        $user = new UserModel();
        $kandang = new KandangTernakModel();

        $page = $this->request->getGet('kandang') ? $this->request->getGet('kandang') : 1;

        $data = [
            'title' => 'Profil',
            'user' => $user->find(session()->get('id')),
            'kandang' => $kandang->paginate(10, page:$page),
            'pager' => $kandang->pager
        ];

        return view('peternak/profile/index', $data);
    }

    public function profil_edit() {
        $user = new UserModel();
        $kandang = new KandangTernakModel();

        $page = $this->request->getGet('kandang') ? $this->request->getGet('kandang') : 1;
        
        $data = [
            'title' => 'Edit Profil',
            'user' => $user->find(session()->get('id')),
            'kandang' => $kandang->paginate(10, page:$page),
            'pager' => $kandang->pager
        ];

        return view('peternak/profile/edit', $data);
    }

    public function map_01() {
        $data = [
            'title' => 'Maps 1',
            'hideNavbar' => true
        ];

        return view('peternak/maps/01', $data);
    }

    public function map_02() {
        $data = [
            'title' => 'Maps 2',
            'hideNavbar' => true
        ];

        return view('peternak/maps/02', $data);
    }
}
