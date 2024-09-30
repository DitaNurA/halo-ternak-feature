<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KandangTernak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kandang_ternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_ternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'   => true,
            ],
            'nama_kandang' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'kapasitas' => [
                'type'          => 'INT',
                'constraint'    => 15,
            ],
            'kecamatan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'kelurahan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'alamat_lengkap' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'ip_alamat' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'foto' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_kandang_ternak');
        $this->forge->addForeignKey('id_ternak', 'ternak', 'id_ternak');
        $this->forge->createTable('kandang_ternak');
    }

    public function down()
    {
        $this->forge->dropTable('kandang_ternak');
    }
}
