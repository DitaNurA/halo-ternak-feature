<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_layanan' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama_layanan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'deskripsi' => [
                'type'          =>  'TEXT',
            ],
            'foto' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_layanan');
        $this->forge->createTable('layanan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan');
    }
}
