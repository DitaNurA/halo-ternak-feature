<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisTernak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_ternak' => [
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
            'jenis_ternak' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
        ]);

        $this->forge->addPrimaryKey('id_jenis_ternak');
        $this->forge->addForeignKey('id_ternak', 'ternak', 'id_ternak');
        $this->forge->createTable('jenis_ternak');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_ternak');
    }
}
