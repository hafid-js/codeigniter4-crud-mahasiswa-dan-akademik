<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'email_mahasiswa' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'alamat' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_mahasiswa', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('mahasiswa','mahasiswa_id_jurusan_foreign');
        // $this->forge->dropForeignKey('mahasiswa','mahasiswa_id_matakuliah_foreign');
        $this->forge->dropTable('mahasiswa');
    }
}
