<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kecamatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kecamatan' => [
                'type'              => 'INT',
                'constraint'        => 15,
                'unsigned'          =>  true,
                'auto_increment'    =>  true
            ],
            'nama_kecamatan' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ]
        ]);

        $this->forge->addPrimaryKey('id_kecamatan');
        $this->forge->createTable('kecamatan');
    }

    public function down()
    {
        $this->forge->dropTable('kecamatan');
    }
}
