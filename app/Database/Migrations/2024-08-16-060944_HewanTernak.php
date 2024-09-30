<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HewanTernak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_hewan' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_kandang_ternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'   => true,
            ],
            'id_ternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'   => true,
            ],
            'id_jenis_ternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'   => true,
            ],
            'nama_hewan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'jenis_kelamin' => [
                'type'          =>  'ENUM("jantan", "betina")',
            ],
            'berat' => [
                'type'          => 'INT',
                'constraint'    => 15,
            ],
            'usia' => [
                'type'          => 'INT',
                'constraint'    => 15,
            ],
            'harga' => [
                'type'          => 'INT',
                'constraint'    => 50,
            ],
            'foto' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'status_dijual' => [
                'type'          => 'BOOLEAN',
                'default'       => false
            ]
        ]);

        $this->forge->addPrimaryKey('id_hewan');
        $this->forge->addForeignKey('id_kandang_ternak', 'kandang_ternak', 'id_kandang_ternak');
        $this->forge->addForeignKey('id_ternak', 'ternak', 'id_ternak');
        $this->forge->addForeignKey('id_jenis_ternak', 'jenis_ternak', 'id_jenis_ternak');
        $this->forge->createTable('hewan_ternak');
    }

    public function down()
    {
        $this->forge->dropTable('hewan_ternak');
    }
}
