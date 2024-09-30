<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ObatModel;

class Obat extends BaseController
{
    protected $obatModel;

    public function __construct()
    {
        $this->obatModel = new ObatModel();
    }
    public function index()
    {
        $data['obat'] = $this->obatModel->getObat();
        $data['toolbar'] = view('admin/obat/toolbar');
        $data['list'] = view('admin/obat/list', $data);
        return view('admin/obat/index', $data);
    }

    public function create()
    {
        // Method to handle creation of a new obat
        return view('admin/obat/create', [
            'form' => view('admin/obat/form')
        ]);
    }

    public function store()
    {
        // Validasi input dan file upload
        $validation = $this->validate([
            'nama_obat'   => 'required',
            'deskripsi'  => 'required',
            'foto'           => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]',
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke form dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Menangani file upload foto
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = '';
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName(); // Generate nama random
            $fileFoto->move('assets/uploads/obat', $namaFoto); // Pindahkan ke folder tujuan
        }

        // Menyimpan data ke database
        $this->obatModel->save([
            'nama_obat'   => $this->request->getPost('nama_obat'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'foto'           => $namaFoto, // Simpan nama foto yang di-upload
        ]);
        // Redirect ke halaman daftar obat setelah berhasil menyimpan
        return redirect()->to('admin/obat')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function detail($id)
    {
        $obat = $this->obatModel->find($id);
        if (!$obat) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Obat with ID ' . $id . ' not found.');
        }

        $data['obat'] = $obat;
        $data['show_detailobat'] = view('admin/obat/show_detail', $data);
        return view('admin/obat/detail', $data);
    }

     // Update a petugas
     public function update($id)
     {
         $obat = $this->obatModel->find($id);
             // Validasi form
             log_message('debug', 'Request adalah POST');
             $validation = $this->validate([
                 'nama_obat'   => 'required',
                 'deskripsi'  => 'required',
                 'foto'           => 'permit_empty|is_image[foto]|max_size[foto,2048]', // Perubahan pada validasi foto
             ]);
     
             // Penanganan file foto
             $fileFoto = $this->request->getFile('foto');
             $namaFoto = $obat['foto']; // Default foto adalah foto lama
     
             // Jika ada file baru yang di-upload
             if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
                 $namaFoto = $fileFoto->getRandomName();
                 $fileFoto->move('assets/uploads/obat', $namaFoto);
                 // Hapus foto lama jika ada file baru
                 if ($obat['foto'] && file_exists('assets/uploads/obat/' . $obat['foto'])) {
                     unlink('assets/uploads/obat/' . $obat['foto']);
                 }
             }
             // Update data ke database
             $this->obatModel->update($id, [
                 'nama_obat'  => $this->request->getPost('nama_obat'),
                 'deskripsi' => $this->request->getPost('deskripsi'),
                 'foto'          => $namaFoto, // Simpan nama foto yang sudah ada atau yang baru
             ]);
             // Redirect ke halaman daftar obat setelah berhasil menyimpan
             return redirect()->to('admin/obat')->with('success', 'Data obat berhasil diupdate.');
     
         $data['obat'] = $obat;
         $data['show_detail'] = view('admin/obat/show_detail', $data);
         return view('admin/obat/detail', $data);
     }
     
}
