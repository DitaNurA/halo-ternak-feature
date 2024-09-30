<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_obat' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama_obat' => [
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

        $this->forge->addPrimaryKey('id_obat');
        $this->forge->createTable('obat');
    }

    public function down()
    {
        $this->forge->dropTable('obat');
    }
}
