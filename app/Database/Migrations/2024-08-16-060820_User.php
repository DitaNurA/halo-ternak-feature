<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'id_role' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
            ],
            'nama' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'alamat' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
                'null' => true
            ],
            'kecamatan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
                'null' => true
            ],
            'desa_binaan' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
                'null' => true
            ],
            'no_registrasi' => [
                'type'          => 'VARCHAR',
                'constraint'    =>  50,
            ],
            'no_wa' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  16,
            ],
            'foto' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'kata_sandi' => [
                'type'          =>  'TEXT',
            ],
            'login_attempt' => [
                'type'          => 'INT',
                'constraint'    =>  15,
                'default'       => 0
            ],
            'last_login_at' => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
            'is_lock' => [
                'type'          => 'BOOLEAN',
                'default'       => false
            ]
        ]);

        $this->forge->addPrimaryKey('id_user');
        $this->forge->addForeignKey('id_role', 'role', 'id_role');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
