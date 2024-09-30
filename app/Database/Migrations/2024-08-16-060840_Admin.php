<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_user' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'   => true,
            ],
            'nama' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'alamat' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'alamat' => [
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
            ]
        ]);

        $this->forge->addPrimaryKey('id_admin');
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
