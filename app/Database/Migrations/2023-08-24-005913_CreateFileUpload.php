<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFileUpload extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_file'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_mahasiswa'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'file'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'keterangan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'status'          => [
                'type'           => 'BIGINT',
                'constraint'     => 1,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id_file');
        $this->forge->createTable('file');
    }

    public function down()
    {
        $this->forge->dropTable('file');
    }
}
