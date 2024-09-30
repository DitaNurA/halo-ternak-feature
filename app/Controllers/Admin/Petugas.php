<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PetugasModel;

class Petugas extends BaseController
{
    protected $petugasModel;

    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        // Mengambil data petugas dari model
        $data['petugas'] = $this->petugasModel->getPetugas();
        
        // Menambahkan view toolbar dan listpetugas ke dalam array $data
        $data['toolbar'] = view('admin/petugas/toolbar');
        $data['list'] = view('admin/petugas/list', $data); // Menyertakan data petugas ke view listpetugas
    
        // Mengirim semua data ke view utama (index.php)
        return view('admin/petugas/index', $data);
    }


    // Show the form to create a new petugas
    // Menampilkan form create untuk petugas (GET)
    public function createForm()
    {
        // Tampilkan halaman form create
        return view('admin/petugas/create', [
            'form' => view('admin/petugas/form'),
        ]);
    }

    // Menyimpan data petugas (POST)
    public function store()
    {
        // Validasi input dan file upload
        $validation = $this->validate([
            'id_user'        => 'required',
            'nama'           => 'required',
            'no_registrasi'  => 'required',
            'kecamatan'      => 'required',
            'desa_binaan'    => 'required',
            'no_wa'          => 'required',
            'password'       => 'required',
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
            $fileFoto->move('assets/uploads/petugas', $namaFoto); // Pindahkan ke folder tujuan
        }

        // Menyimpan data ke database
    try {
        $this->petugasModel->save([
            'id_user'        => $this->request->getPost('id_user'),
            'nama'           => $this->request->getPost('nama'),
            'no_registrasi'  => $this->request->getPost('no_registrasi'),
            'kecamatan'      => $this->request->getPost('kecamatan'),
            'desa_binaan'    => $this->request->getPost('desa_binaan'),
            'no_wa'       => $this->request->getPost('no_wa'),
            'password'       => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'status'         => $this->request->getPost('status') ?? 'aktif', // Nilai default 'aktif' jika status tidak diisi
            'foto'           => $namaFoto, // Simpan nama foto yang di-upload
        ]);
    } catch (\Exception $e) {
        // Jika terjadi kesalahan saat menyimpan ke database
        return redirect()->back()->withInput()->with('errors', ['database' => 'Gagal menyimpan data ke database: ' . $e->getMessage()]);
    }
        // Redirect ke halaman daftar petugas setelah berhasil menyimpan
        return redirect()->to('admin/petugas')->with('success', 'Data petugas berhasil ditambahkan.');
        log_message('debug', 'Data yang akan disimpan: ' . json_encode($this->request->getPost()));

    }

    // Display the details of a specific petugas
    public function edit($id)
    {
        $petugas = $this->petugasModel->find($id);
        if (!$petugas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Petugas with ID ' . $id . ' not found.');
        }

        $data['petugas'] = $petugas;
        $data['show_detail'] = view('admin/petugas/show_detail', $data);
        return view('admin/petugas/detail', $data);
    }

    // Update a petugas
    public function update($id)
{
    $petugas = $this->petugasModel->find($id);

    if (!$petugas) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Petugas with ID ' . $id . ' not found.');
    }
    log_message('debug', 'Memulai update untuk ID: ' . $id);
        // Validasi form
        log_message('debug', 'Request adalah POST');
        $validation = $this->validate([
            'id_user'        => 'required',
            'nama'           => 'required',
            'no_registrasi'  => 'required',
            'kecamatan'      => 'required',
            'desa_binaan'    => 'required',
            'no_wa   '       => 'required',
            'password'       => 'permit_empty', // Password boleh kosong, min length 6 jika diisi
            'foto'           => 'permit_empty|is_image[foto]|max_size[foto,2048]', // Perubahan pada validasi foto
        ]);

        if (!$validation) {
            log_message('debug', 'Validasi gagal: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Penanganan file foto
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $petugas['foto']; // Default foto adalah foto lama

        // Jika ada file baru yang di-upload
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('assets/uploads/petugas', $namaFoto);
            // Hapus foto lama jika ada file baru
            if ($petugas['foto'] && file_exists('assets/uploads/petugas/' . $petugas['foto'])) {
                unlink('assets/uploads/petugas/' . $petugas['foto']);
            }
        }
        // Cek apakah password diubah atau tetap
        $password = $this->request->getPost('password') ? password_hash($this->request->getPost('password'), PASSWORD_BCRYPT) : $petugas['password'];

        // Update data ke database
        $this->petugasModel->update($id, [
            'id_user'       => $this->request->getPost('id_user'),
            'nama'          => $this->request->getPost('nama'),
            'no_registrasi' => $this->request->getPost('no_registrasi'),
            'kecamatan'     => $this->request->getPost('kecamatan'),
            'desa_binaan'   => $this->request->getPost('desa_binaan'),
            'no_wa'         => $this->request->getPost('no_wa'),
            'password'      => $password, // Simpan password baru jika diubah, atau password lama jika tidak diubah
            'status'        => $this->request->getPost('status'),
            'foto'          => $namaFoto, // Simpan nama foto yang sudah ada atau yang baru
        ]);
        // Redirect ke halaman daftar petugas setelah berhasil menyimpan
        return redirect()->to('admin/petugas')->with('success', 'Data petugas berhasil diupdate.');

    $data['petugas'] = $petugas;
    $data['show_detail'] = view('admin/petugas/show_detail', $data);
    return view('admin/petugas/detail', $data);
}


    // Delete a petugas
    public function delete($id)
    {
        $petugas = $this->petugasModel->find($id);
        if ($petugas) {
            if ($petugas['foto'] && file_exists('assets/uploads/petugas/' . $petugas['foto'])) {
                unlink('assets/uploads/petugas/' . $petugas['foto']);
            }
            $this->petugasModel->delete($id);
        }

        return redirect()->to('/admin/petugas');
    }
}