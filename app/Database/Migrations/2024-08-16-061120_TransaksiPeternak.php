<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiPeternak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_layanan' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
                'unsigned'   => true,
            ],
            'id_peternak' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
                'unsigned'   => true,
            ],
            'id_hewan_ternak' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
                'unsigned'   => true,
            ],
            'id_petugas' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
                'unsigned'   => true,
            ],
            'deskripsi' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'tanggal' => [
                'type'          =>  'DATE',
            ],
            'waktu' => [
                'type'          =>  'TIME',
            ],
            'foto' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'status' => [
                'type'          =>  'ENUM("selesai", "proses", "ditolak")',
                'default'       =>  'proses'
            ]
        ]);

        $this->forge->addPrimaryKey('id_transaksi');
        $this->forge->addForeignKey('id_layanan', 'layanan', 'id_layanan');
        $this->forge->addForeignKey('id_peternak', 'user', 'id_user');
        $this->forge->addForeignKey('id_hewan_ternak', 'hewan_ternak', 'id_hewan');
        $this->forge->addForeignKey('id_petugas', 'user', 'id_user');
        $this->forge->createTable('transaksi_peternak');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_peternak');
    }
}
