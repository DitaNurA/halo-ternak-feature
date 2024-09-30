<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_role' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama' => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
            ]
        ]);

        $this->forge->addPrimaryKey('id_role');
        $this->forge->createTable('role');
    }

    public function down()
    {
        $this->forge->dropTable('role');
    }
}
