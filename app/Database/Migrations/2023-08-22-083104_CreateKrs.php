<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKrs extends Migration
{
    public function up()
    {
    $this->forge->addField([
        'id_krs' => [
            'type'           => 'BIGINT',
            'constraint'     => 20,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'id_mahasiswa' => [
            'type'           => 'BIGINT',
            'constraint'     => 20,
            'unsigned'       => true,
        ],
         'id_matakuliah' => [
            'type'           => 'BIGINT',
            'constraint'     => 20,
            'unsigned'       => true,
        ],
        'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        
    ]);
    $this->forge->addKey('id_krs', true);
    $this->forge->createTable('krs');
}

public function down()
{
    // $this->forge->dropForeignKey('krs','krs_id_mahasiswa_foreign');
    // $this->forge->dropForeignKey('krs','krs_id_matakuliah_foreign');
    $this->forge->dropTable('krs');
}
}