<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peternak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peternak' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'alamat' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'no_wa' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
            ],
            'foto' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'kata_sandi' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'id_user' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
            ],
        ]);

        $this->forge->addPrimaryKey('id_peternak');
        $this->forge->createTable('peternak');
    }

    public function down()
    {
        $this->forge->dropTable('peternak');
    }
}
