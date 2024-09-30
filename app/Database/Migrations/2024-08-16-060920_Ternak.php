<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ternak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama_hewan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_ternak');
        $this->forge->createTable('ternak');
    }

    public function down()
    {
        $this->forge->dropTable('ternak');
    }
}
