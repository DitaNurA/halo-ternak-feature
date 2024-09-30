<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('layanan')->insert([
            'nama_layanan' => 'Ternak Sakit',
            'deskripsi' => 'Layanan ini mencakup diagnosa, pengobatan, dan pemulihan untuk ternak yang mengalami masalah kesehatan.',
            'foto' => 'ternak-sakit.svg',
        ]);

        $this->db->table('layanan')->insert([
            'nama_layanan' => 'Ternak Kawin',
            'deskripsi' => 'Layanan ini membantu dalam proses reproduksi ternak. Termasuk di dalamnya adalah inseminasi buatan atau bantuan kawin secara alami.',
            'foto' => 'ternak-kawin.svg'
        ]);

        $this->db->table('layanan')->insert([
            'nama_layanan' => 'Periksa Bunting',
            'deskripsi' => 'Layanan ini fokus pada perawatan sapi yang sedang dalam masa kebuntingan. Terdiri dari pemeriksaan rutin, pemantauan kesehatan dan persiapan menjelang kelahiran.',
            'foto' => 'periksa-bunting.svg'
        ]);

        $this->db->table('obat')->insert([
            'nama_obat' => 'Obat Sapi',
            'deskripsi' => 'Obat sapi kami dirancang untuk menjaga kesehatan ternak.',
            'foto' => 'obat.png'
        ]);

        $this->db->table('role')->insert([
            'nama' => 'admin'
        ]);

        $this->db->table('role')->insert([
            'nama' => 'peternak'
        ]);

        $this->db->table('role')->insert([
            'nama' => 'petugas'
        ]);

        $this->db->table('user')->insert([
            'id_role' => 2,
            'nama' => 'peternak',
            'no_wa' => '0812345678',
            'kata_sandi' => password_hash('123456', PASSWORD_BCRYPT)
        ]);

        $this->db->table('user')->insert([
            'id_role' => 3,
            'nama' => 'petugas',
            'no_wa' => '0812345678',
            'kata_sandi' => password_hash('123456', PASSWORD_BCRYPT)
        ]);

        $this->db->table('user')->insert([
            'id_role' => 2,
            'nama' => 'Erick',
            'no_wa' => '0812345676',
            'kata_sandi' => password_hash('Erick123*', PASSWORD_BCRYPT)
        ]);

        $this->db->table('ternak')->insert([
            'nama_hewan' => 'Domba'
        ]);

        $this->db->table('jenis_ternak')->insert([
            'id_ternak' => 1,
            'jenis_ternak' => 'PE'
        ]);

        // $this->db->table('hewan_ternak')->insert([
        //     'id_ternak' => 1,
        //     'id_jenis_ternak' => 1,
        //     'nama_hewan' => 'Domba 01',
        //     'jenis_kelamin' => 'betina',
        //     'berat' => 70,
        //     'usia' => 2,
        //     'harga' => 2000000,
        //     'foto' => 'domba.png'
        // ]);

        $this->db->table('kecamatan')->insert([
            'nama_kecamatan' => 'Palang'
        ]);

        $this->db->table('kecamatan')->insert([
            'nama_kecamatan' => 'Semanding'
        ]);

        $this->db->table('kecamatan')->insert([
            'nama_kecamatan' => 'Kerek'
        ]);

        $this->db->table('kecamatan')->insert([
            'nama_kecamatan' => 'Merakurak'
        ]);

        // $this->db->table('kandang_ternak')->insert([
        //     'id_ternak' => 1,
        //     'nama_kandang' => 'Kandang Sapi Betina',
        //     'kapasitas' => 20,
        //     'kecamatan' => 'Latsari',
        // ]);
    }
}
