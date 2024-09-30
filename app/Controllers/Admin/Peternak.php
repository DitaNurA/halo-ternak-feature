<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PeternakModel;

class Peternak extends BaseController
{
    protected $peternakModel;
    public function __construct()
    {
        $this->peternakModel = new PeternakModel();
    }

    public function index()
    {
        // Mengambil data peternak dari model
        $data['peternak'] = $this->peternakModel->getAllPeternak();
        
        // Menambahkan view  listpeternak ke dalam array $data
        $data['list'] = view('admin/peternak/list', $data); // Menyertakan data peternak ke view listpeternak
    
        // Mengirim semua data ke view utama (peternak.php)
        return view('admin/peternak/index', $data);
    }


     // Display the details of a specific peternak
    public function detail($id)
    {
        $peternak = $this->peternakModel->find($id);
        if (!$peternak) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Peternak with ID ' . $id . ' not found.');
        }

        $data['peternak'] = $peternak;
        $data['show_detail'] = view('admin/peternak/show_detail', $data);
        return view('admin/peternak/detail', $data);
    }

     public function update($id)
{
    $peternak = $this->peternakModel->find($id);

    if (!$peternak) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Peternak with ID ' . $id . ' not found.');
    }
    log_message('debug', 'Memulai update untuk ID: ' . $id);
    log_message('debug', 'Request adalah POST');
    $validation = $this->validate([
        'nama'               => 'required',
        'alamat'             => 'required',
        'jumlah_kandang'     => 'required',
        'jumlah_ternak'      => 'required',
        'layanan_selesai'    => 'required',
        'no_wa'              => 'required',
        'password'           => 'permit_empty|min_length[6]', // Tambahkan validasi min length
        'foto'               => 'permit_empty|is_image[foto]|max_size[foto,2048]',
    ]);

    if (!$validation) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    log_message('debug', 'Validasi sukses');

    // Penanganan file foto
    $fileFoto = $this->request->getFile('foto');
    $namaFoto = $peternak['foto']; // Default foto adalah foto lama

    if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('assets/uploads/peternak', $namaFoto);

        if ($peternak['foto'] && file_exists('assets/uploads/peternak/' . $peternak['foto'])) {
            unlink('assets/uploads/peternak/' . $peternak['foto']);
        }
    }

    // Cek apakah password diubah atau tetap
    $password = $this->request->getPost('password') ? password_hash($this->request->getPost('password'), PASSWORD_DEFAULT) : $peternak['password'];

    // Update data ke database
    $this->peternakModel->update($id, [
        'nama'              => $this->request->getPost('nama'),
        'alamat'            => $this->request->getPost('alamat'),
        'jumlah_kandang'    => $this->request->getPost('jumlah_kandang'),
        'jumlah_ternak'     => $this->request->getPost('jumlah_ternak'),
        'layanan_selesai'   => $this->request->getPost('layanan_selesai'),
        'no_wa'             => $this->request->getPost('no_wa'),
        'password'          => $password,
        'foto'              => $namaFoto,
    ]);

    return redirect()->to('/admin/peternak');

    $data['peternak'] = $peternak;
    $data['show_detail'] = view('admin/peternak/show_detail', $data);
    return view('admin/peternak/detail', $data);
}

    
}
