<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KeteranganPetugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keterangan' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_transaksi_peternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
            ],
            // 'id_layanan' => [
            //     'type'          => 'INT',
            //     'constraint'    => 15,
            //     'unsigned'   => true,
            // ],
            // 'id_peternak' => [
            //     'type'          => 'INT',
            //     'constraint'    => 15,
            //     'unsigned'   => true,
            // ],
            // 'id_kandang_ternak' => [
            //     'type'          => 'INT',
            //     'constraint'    => 15,
            //     'unsigned'   => true,
            // ],
            // 'id_ternak' => [
            //     'type'          => 'INT',
            //     'constraint'    => 15,
            //     'unsigned'   => true,
            // ],
            // 'id_petugas' => [
            //     'type'          => 'INT',
            //     'constraint'    => 15,
            //     'unsigned'   => true,
            // ],
            // 'tanggal' => [
            //     'type'          =>  'DATE',
            // ],
            // 'jam_mulai' => [
            //     'type'          =>  'TIME',
            // ],
            // 'id_kondisi' => [
            //     'type'          =>  'INT',
            //     'constraint'    =>  15,
            //     'unsigned'   => true,
            // ],
            'kondisi' => [
                'type'          => 'ENUM("sakit", "tidak_sakit", "kawin", "tidak_kawin", "bunting", "tidak_bunting")'
            ],
            'jam_akhir' => [
                'type'          =>  'TIME',
            ],
            'keterangan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'foto' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_keterangan');
        $this->forge->addForeignKey('id_transaksi_peternak', 'transaksi_peternak', 'id_transaksi');
        // $this->forge->addForeignKey('id_layanan', 'layanan', 'id_layanan');
        // $this->forge->addForeignKey('id_peternak', 'peternak', 'id_peternak');
        // $this->forge->addForeignKey('id_kandang_ternak', 'kandang_ternak', 'id_kandang_ternak');
        // $this->forge->addForeignKey('id_ternak', 'ternak', 'id_ternak');
        // $this->forge->addForeignKey('id_petugas', 'petugas', 'id_petugas');
        // $this->forge->addForeignKey('id_kondisi', 'kondisi', 'id_kondisi');
        $this->forge->createTable('keterangan_petugas');
    }

    public function down()
    {
        $this->forge->dropTable('keterangan_petugas');
    }
}
