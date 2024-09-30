<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatPesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_riwayat' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_keterangan' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_riwayat');
        $this->forge->addForeignKey('id_keterangan', 'keterangan_petugas', 'id_keterangan');
        $this->forge->createTable('riwayat_pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_pesanan');
    }
}
