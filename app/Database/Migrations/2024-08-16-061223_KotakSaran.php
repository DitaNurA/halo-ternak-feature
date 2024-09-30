<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KotakSaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_saran' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'no_wa' => [
                'type'          => 'INT',
                'constraint'    => 15,
            ],
            'saran' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_saran');
        $this->forge->createTable('kotak_saran');
    }

    public function down()
    {
        $this->forge->dropTable('kotak_saran');
    }
}
