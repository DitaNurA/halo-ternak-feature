<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\EdukasiModel;

class Edukasi extends BaseController
{
    protected $edukasiModel;

    public function __construct()
    {
        $this->edukasiModel = new EdukasiModel();
    }
    public function index()
    {
        $data['edukasi'] = $this->edukasiModel->getEdukasi();
        $data['toolbar'] = view('admin/edukasi/toolbar');
        $data['list'] = view('admin/edukasi/list', $data);
        return view('admin/edukasi/index', $data);
    }

    public function create()
    {
        // Method to handle creation of a new petugas
        return view('admin/edukasi/create', [
            'form' => view('admin/edukasi/form')
        ]);
    }

    public function store()
    {
        // Validasi input dan file upload
        $validation = $this->validate([
            'judul_yt'   => 'required',
            'deskripsi'  => 'required',
            'link_yt'    => 'required',
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke form dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // Menyimpan data ke database
        $this->edukasiModel->save([
            'judul_yt'   => $this->request->getPost('judul_yt'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'link_yt'    => $this->request->getPost('link_yt'), // Simpan nama foto yang di-upload
        ]);
        // Redirect ke halaman daftar obat setelah berhasil menyimpan
        return redirect()->to('admin/edukasi')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function detail($id)
    {
        $edukasi = $this->edukasiModel->find($id);
        if (!$edukasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Obat with ID ' . $id . ' not found.');
        }

        $data['edukasi'] = $edukasi;
        $data['showdetail'] = view('admin/edukasi/showdetail', $data);
        return view('admin/edukasi/detail', $data);
    }

    public function update($id)
     {
         $edukasi = $this->edukasiModel->find($id);
             // Validasi form
             log_message('debug', 'Request adalah POST');
             $validation = $this->validate([
                 'judul_yt'   => 'required',
                 'deskripsi'  => 'required',
                 'link_yt'    => 'required'
             ]);

              // Update data ke database
              $this->edukasiModel->update($id, [
                'judul_yt'  => $this->request->getPost('judul_yt'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'link_yt'   => $this->request->getPost('link_yt'), 
            ]);
            // Redirect ke halaman daftar edukasi setelah berhasil menyimpan
            return redirect()->to('admin/edukasi')->with('success', 'Data obat berhasil diupdate.');
    
        $data['edukasi'] = $edukasi;
        $data['showdetail'] = view('admin/edukasi/showdetail', $data);
        return view('admin/edukasi/detail', $data);
}
}