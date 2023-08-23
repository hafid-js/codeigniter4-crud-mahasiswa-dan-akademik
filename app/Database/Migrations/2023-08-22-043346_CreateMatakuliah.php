<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMatakuliah extends Migration
{
    public function up()
    {
    $this->forge->addField([
        'id_matakuliah' => [
            'type'           => 'BIGINT',
            'constraint'     => 20,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'kode_matakuliah' => [
            'type'       => 'VARCHAR',
            'constraint' => '60',
            'null' => true,
        ],
        'nama_matakuliah' => [
            'type'       => 'VARCHAR',
            'constraint' => '60',
            'null' => true,
        ],
        'sks' => [
            'type'           => 'BIGINT',
            'constraint'     => 1,
            'unsigned'       => true,
        ],
        
    ]);
    $this->forge->addKey('id_matakuliah', true);
    $this->forge->createTable('matakuliah');
}

public function down()
{
    $this->forge->dropTable('matakuliah');
}
}
