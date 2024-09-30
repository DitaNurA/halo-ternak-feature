<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kondisi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kondisi' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_layanan' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'   => true,
            ],
            'nama_kondisi' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_kondisi');
        $this->forge->addForeignKey('id_layanan', 'layanan', 'id_layanan');
        $this->forge->createTable('kondisi');
    }

    public function down()
    {
        $this->forge->dropTable('kondisi');
    }
}
