<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_petugas' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_user' => [
                'type'          =>  'INT',
                'constraint'    =>  15,
                'unsigned'   => true,
            ],
            'nama' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'kecamatan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'desa_binaan' => [
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
        ]);

        $this->forge->addPrimaryKey('id_petugas');
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->createTable('petugas');
    }

    public function down()
    {
        $this->forge->dropTable('petugas');
    }
}
