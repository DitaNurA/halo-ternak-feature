<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ForgotPassword extends BaseController
{
    protected $user;
    
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index() {
        $data = [
            'title' => 'Lupa Password',
            'form_title' => 'Lupa Kata Sandi?'
        ];

        return view('auth/forgot-password/index', $data);
    }

    public function verify() {
        $data = [
            'title' => 'Verifikasi',
            'form_title' => 'Verifikasi'
        ];

        return view('auth/forgot-password/verify', $data);
    }

    public function new_password() {
        $data = [
            'title' => 'Buat Kata Sandi',
            'form_title' => 'Masukkan Kata Sandi Baru'
        ];

        return view('auth/forgot-password/new', $data);
    }
}
