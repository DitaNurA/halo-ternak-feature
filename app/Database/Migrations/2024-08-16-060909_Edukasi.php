<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Edukasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_edukasi' => [
                'type'          => 'INT',
                'constraint'    => 15,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'judul_yt' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'deskripsi' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ],
            'link_yt' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  50,
            ]
        ]);

        $this->forge->addPrimaryKey('id_edukasi');
        $this->forge->createTable('edukasi');
    }

    public function down()
    {
        $this->forge->dropTable('edukasi');
    }
}
