<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    protected $user;
    protected $rules = [
        'no_wa' => 'required',
        'password' => 'required'
    ];
    protected $validationMessage;
    
    public function __construct()
    {
        helper('form_helper');
        $this->user = new UserModel();
        $this->validationMessage['no_wa'] = validation_error_message();
        $this->validationMessage['password'] = validation_error_message();
    }

    public function index() {
        $data = [
            'title' => 'Masuk',
        ];

        return view('auth/login', $data);
    }

    public function store() {
        if ( !$this->validate($this->rules, $this->validationMessage) ) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => \Config\Services::validation()->getErrors()
            ]);
        }

        $user = $this->user->select('user.*, role.nama as role')->join('role', 'role.id_role = user.id_role')->where('user.no_wa', $this->request->getVar('no_wa'))->first();

        if ( $user ) {
            $last_login = date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($user['last_login_at'])));

            if ( boolval($user['is_lock']) && date('Y-m-d H:i:s') >= $last_login ) {
                $this->user->update($user['id_user'], [
                    'is_lock' => false,
                    'login_attempt' => 0,
                    'last_login_at' => null
                ]);
            }

            if ( !boolval($user['is_lock']) ) {
                $this->user->update($user['id_user'], [
                    'login_attempt' => intval($user['login_attempt']) + 1,
                    'last_login_at' => date('Y-m-d H:i:s')
                ]);
            }

            if ( !boolval($user['is_lock']) && intval($user['login_attempt']) >= 5 ) {
                $this->user->update($user['id_user'], [
                    'is_lock' => true
                ]);
            }

            if ( boolval($user['is_lock']) ) {
                return $this->response->setJSON([
                    'status' => false,
                    'error' => 'Akun anda terkunci! mohon menunggu selama 30 menit'
                ]);
            }

            if ( password_verify($this->request->getVar('password'), $user['kata_sandi']) ) {
                session()->set([
                    'id' => $user['id_user'],
                    'nama' => $user['nama'],
                    'no_wa' => $user['no_wa'],
                    'foto' => $user['foto'],
                    'id_role' => $user['id_role'],
                    'role' => $user['role'],
                ]);

                if ( $this->request->getVar('remember_me') ) {
                    $_COOKIE['id_user'] = $user['id_user'];
                }

                return $this->response->setJSON([
                    'status' => true,
                    'message' => '200 OK',
                    'redirect_url' => role_url()
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => '401 Unauthorized'
        ]);
    }
}
